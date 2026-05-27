# Portfolio CMS — Full Documentation & Codebase Analysis

## Table of Contents
1. [Overview](#1-overview)
2. [Architecture](#2-architecture)
3. [Database Schema](#3-database-schema)
4. [Models](#4-models)
5. [Livewire Components](#5-livewire-components)
6. [Routes](#6-routes)
7. [Portfolio Landing Page](#7-portfolio-landing-page)
8. [Admin Dashboard](#8-admin-dashboard)
9. [Contact Form](#9-contact-form)
10. [Mail System](#10-mail-system)
11. [File Structure](#11-file-structure)

---

## 1. Overview

**Tech Stack:**
- **Laravel 13** — PHP framework
- **Livewire v4.3** — Full-stack framework for dynamic UI
- **Flux UI** — Component library built on Livewire
- **MySQL** — Database (via Laragon)
- **Tailwind CSS** — Utility-first styling
- **Alpine.js** — Lightweight JS for interactivity (on portfolio)
- **Mail (log driver)** — Contact form email handling

This is a **Portfolio CMS** that allows the user to manage their portfolio content (projects, work experience, skills, profile) through an admin panel, and displays it on a public-facing portfolio landing page.

---

## 2. Architecture

```
┌─────────────────────────────────────┐
│         Portfolio Landing Page       │
│      / (routes/web.php:11-18)       │
│  Plain Blade view + Livewire widget  │
└──────────┬──────────────────────────┘
           │ reads from DB
           ▼
┌─────────────────────────────────────┐
│          Database (MySQL)            │
│  profiles | projects | experiences   │
│  skills | users | etc.              │
└──────────┬──────────────────────────┘
           │ managed via
           ▼
┌─────────────────────────────────────┐
│         Admin Panel (Livewire)       │
│  /dashboard | /projects | /skills   │
│  /experiences | /profile            │
│  Authenticated (auth + verified)     │
└─────────────────────────────────────┘
```

### Key Design Decisions

| Decision | Reason |
|----------|--------|
| Separate Livewire class + view (not SFC) | Easier debugging, clearer MVC-like structure |
| MySQL over SQLite | User preference for Laragon environment |
| Tags stored as JSON array | Flexible, no separate pivot table needed |
| Portfolio as plain Blade (not Livewire) | Simpler, no overhead for a public page |
| Alpine.js loaded via CDN | Lightweight interactivity (mobile menu, scroll effects) |

---

## 3. Database Schema

### `profiles`
| Column | Type | Notes |
|--------|------|-------|
| id | bigint (PK) | Auto-increment |
| name | string(255) | Display name |
| avatar | string(255) | Nullable. Path to stored image |
| tagline | string(255) | Nullable. One-liner description |
| github_url | string(255) | Nullable. Full URL |
| linkedin_url | string(255) | Nullable. Full URL |
| email | string(255) | Nullable. Contact email address |
| created_at | timestamp | |
| updated_at | timestamp | |

### `projects`
| Column | Type | Notes |
|--------|------|-------|
| id | bigint (PK) | Auto-increment |
| title | string(255) | Project name |
| description | text | Nullable. Long description |
| image | string(255) | Nullable. Path to uploaded image |
| tags | json | Nullable. Array of tag strings |
| color | string(255) | Default: `from-indigo-500 to-purple-500` |
| demo_url | string(255) | Nullable. Link to live demo |
| sort_order | integer | Default: 0. For manual ordering |
| created_at | timestamp | |
| updated_at | timestamp | |

### `experiences`
| Column | Type | Notes |
|--------|------|-------|
| id | bigint (PK) | Auto-increment |
| role | string(255) | Job title |
| company | string(255) | Company name |
| period | string(255) | e.g. "Jan 2024 - Present" |
| description | text | Nullable. What you did |
| tags | json | Nullable. Array of skill tags |
| sort_order | integer | Default: 0 |
| created_at | timestamp | |
| updated_at | timestamp | |

### `skills`
| Column | Type | Notes |
|--------|------|-------|
| id | bigint (PK) | Auto-increment |
| name | string(255) | Skill name |
| sort_order | integer | Default: 0 |
| created_at | timestamp | |
| updated_at | timestamp | |

---

## 4. Models

All models use Laravel 13's **attribute-based `#[Fillable]`** pattern instead of the traditional `$fillable` property.

| Model | File | Fillable Fields |
|-------|------|-----------------|
| `Profile` | `app/Models/Profile.php` | name, avatar, tagline, github_url, linkedin_url, email |
| `Project` | `app/Models/Project.php` | title, description, image, tags, color, demo_url, sort_order |
| `Experience` | `app/Models/Experience.php` | role, company, period, description, tags, sort_order |
| `Skill` | `app/Models/Skill.php` | name, sort_order |

**Casts:** `Project` and `Experience` cast `tags` column to `array` for automatic JSON serialization/deserialization.

---

## 5. Livewire Components

All components follow the **separate class + view** pattern.

| Component | Class | View | Purpose |
|-----------|-------|------|---------|
| `Projects` | `app/Livewire/Projects.php` | `resources/views/livewire/projects.blade.php` | CRUD for portfolio projects |
| `Experiences` | `app/Livewire/Experiences.php` | `resources/views/livewire/experiences.blade.php` | CRUD for work experience |
| `Skills` | `app/Livewire/Skills.php` | `resources/views/livewire/skills.blade.php` | CRUD for skills list |
| `Profile` | `app/Livewire/Profile.php` | `resources/views/livewire/profile.blade.php` | Edit portfolio profile info |
| `ContactForm` | `app/Livewire/ContactForm.php` | `resources/views/livewire/contact-form.blade.php` | Public contact form (embedded in portfolio) |

### Pattern (applies to all CRUD components)

Each CRUD component has:
- **Properties** — `public $field = '';` for each form field
- **`$rules`** — Validation rules array
- **`resetForm()`** — Clears all fields and validation
- **`create()`** — Opens modal in "add" mode
- **`store()`** — Validates and creates record, shows toast
- **`edit($id)`** — Loads record into form modal
- **`update()`** — Validates and updates record
- **`confirmDelete($id)`** — Opens delete confirmation modal
- **`delete()`** — Deletes record
- **`render()`** — Returns view with paginated data

### Title Attributes

Each admin component uses `#[Title('ModuleName')]` attribute to set the browser tab title:
- `#[Layout('layouts.app')]` — Wraps in admin layout (sidebar + header)
- `#[Title('Projects')]` — Sets `<title>` to "Projects - CMS"

### Tags Multi-Select (Projects & Experiences)

Tags are implemented as:
1. **Checkboxes** from `skills` table — select existing skills
2. **Text input** — for custom tags (comma-separated)
- Both are merged on save: `array_merge($this->tags, array_map('trim', explode(',', $this->customTags)))`

### File Uploads

Components use `Livewire\WithFileUploads` trait:
- **Projects** — `$image` uploaded to `storage/app/public/projects/`
- **Profile** — `$avatar` uploaded to `storage/app/public/profiles/`
- Images are displayed via `Storage::url($path)`
- A `storage:link` symlink connects `public/storage` → `storage/app/public`

---

## 6. Routes

Defined in `routes/web.php`:

| Method | URI | Name | Handler |
|--------|-----|------|---------|
| GET | `/` | `home` | Closure → returns portfolio view |
| GET | `/portfolio` | `portfolio` | Closure → returns portfolio view |
| GET | `/dashboard` | `dashboard` | `dashboard` view |
| GET | `/projects` | `projects.index` | `App\Livewire\Projects` |
| GET | `/experiences` | `experiences.index` | `App\Livewire\Experiences` |
| GET | `/skills` | `skills.index` | `App\Livewire\Skills` |
| GET | `/profile` | `profile` | `App\Livewire\Profile` |
| GET | `/settings/profile` | `profile.edit` | Livewire starter kit SFC |

The `/` and `/portfolio` routes return identical portfolio views. All admin routes are protected by `auth` + `verified` middleware (via Fortify).

---

## 7. Portfolio Landing Page

**File:** `resources/views/portfolio.blade.php`

A fully responsive, dark-themed landing page with:

### Sections
1. **Navigation** — Sticky, blur backdrop, scroll spy (Alpine.js), responsive hamburger menu
2. **Hero** — Avatar with glow ring, gradient name, tagline, CTA buttons, social links with SVG icons
3. **Projects** — Glass cards, gradient accents, hover effects, "Show All" toggle
4. **Experience** — Timeline layout with gradient circles, hover scale
5. **Skills** — Flex-wrap badges with hover glow
6. **Contact** — Livewire `ContactForm` component (email to owner)
7. **Footer** — Dynamic year + profile name
8. **Back to Top** — Floating gradient button with Alpine.js show/hide

### Data Flow
The route closure queries DB and passes `$profile`, `$projects`, `$experiences`, `$skills` to the view. If any collection is empty, the section is hidden via `@if` guards.

### Key Styling
- Dark theme (`bg-zinc-950`)
- Indigo/pink accents via `bg-gradient-to-r`
- `[x-cloak]` for Alpine.js prevent FOUC
- Decorative blur orbs in hero background
- Glass morphism effects (`backdrop-blur`, semi-transparent backgrounds)

---

## 8. Admin Dashboard

**File:** `resources/views/dashboard.blade.php`

Shows an overview of portfolio data:
- **Stat cards** — Count of Projects, Experiences, Skills, Profile name
- **Recent Projects** — Last 5 projects with colored dot indicator
- **Recent Experiences** — Last 5 experiences with role/company/period
- **Skills Cloud** — All skills as badges

Each section has a "View all" / "Manage" link to the respective CRUD page.

---

## 9. Contact Form

**Component:** `App\Livewire\ContactForm`
**View:** `resources/views/livewire/contact-form.blade.php`

- Visitors fill in name (optional), email, and message
- On submit: validates, sends email to profile's contact email
- Shows inline success message after submission
- Fields are cleared after successful send
- Shows loading state while "sending"

---

## 10. Mail System

**Mailable:** `App\Mail\ContactNotification`

- `from` address configured in `.env`
- `replyTo` set to the visitor's email
- Rendered via `resources/views/emails/contact-notification.blade.php`

**Current Setup:**
- Mail driver: `log` (writes to `storage/logs/laravel.log`)
- To use real email: configure SMTP in `.env` (e.g. Gmail with App Password)

---

## 11. File Structure

```
livewire-app/
├── app/
│   ├── Livewire/
│   │   ├── ContactForm.php     # Contact form component
│   │   ├── Experiences.php     # Experiences CRUD
│   │   ├── Profile.php         # Portfolio profile settings
│   │   ├── Projects.php        # Projects CRUD
│   │   └── Skills.php          # Skills CRUD
│   ├── Mail/
│   │   └── ContactNotification.php  # Contact email mailable
│   └── Models/
│       ├── Experience.php
│       ├── Profile.php
│       ├── Project.php
│       └── Skill.php
├── database/
│   └── migrations/
│       ├── ...create_profiles_table.php
│       ├── ...create_projects_table.php    (includes image column)
│       ├── ...create_experiences_table.php
│       └── ...create_skills_table.php
├── resources/
│   └── views/
│       ├── emails/
│       │   └── contact-notification.blade.php
│       ├── layouts/
│       │   └── app/
│       │       └── sidebar.blade.php    # Admin sidebar with menu
│       ├── livewire/
│       │   ├── projects.blade.php
│       │   ├── experiences.blade.php
│       │   ├── skills.blade.php
│       │   ├── profile.blade.php
│       │   └── contact-form.blade.php
│       ├── partials/
│       │   └── head.blade.php          # <title> tag location
│       ├── dashboard.blade.php
│       └── portfolio.blade.php
├── routes/
│   └── web.php
└── .env
```

---

> **Generated:** 2026-05-27
> **Laravel:** 13.11.2 | **Livewire:** 4.3.0 | **PHP:** 8.4+
