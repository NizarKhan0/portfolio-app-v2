<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Skill;
use Flux\Flux;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Projects')]
class Projects extends Component
{
    use WithFileUploads, WithPagination;

    public $title = '';
    public $description = '';
    public $image;
    public $existingImage;
    public $tags = [];
    public $customTags = '';
    public $color = 'from-indigo-500 to-purple-500';
    public $demo_url = '';
    public $projectId = null;
    public $showModal = false;
    public $confirmingDelete = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'tags' => 'nullable|array',
        'customTags' => 'nullable|string',
        'color' => 'required|string',
        'demo_url' => 'nullable|url',
    ];

    public function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->existingImage = null;
        $this->tags = [];
        $this->customTags = '';
        $this->color = 'from-indigo-500 to-purple-500';
        $this->demo_url = '';
        $this->projectId = null;
        $this->showModal = false;
        $this->resetValidation();
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'tags' => array_merge(
                $this->tags,
                $this->customTags ? array_map('trim', explode(',', $this->customTags)) : []
            ),
            'color' => $this->color,
            'demo_url' => $this->demo_url,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('projects', 'public');
        }

        $maxSort = Project::max('sort_order') ?? 0;
        $data['sort_order'] = $maxSort + 1;

        Project::create($data);

        Flux::toast(variant: 'success', text: 'Project created successfully.');
        $this->resetForm();
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->projectId = $project->id;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->existingImage = $project->image;
        $this->image = null;

        $allSkills = Skill::orderBy('sort_order')->pluck('name')->toArray();
        $tags = is_array($project->tags) ? $project->tags : [];
        $this->tags = array_intersect($tags, $allSkills);
        $this->customTags = implode(', ', array_diff($tags, $allSkills));

        $this->color = $project->color;
        $this->demo_url = $project->demo_url;
        $this->showModal = true;
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();

        $project = Project::findOrFail($this->projectId);

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'tags' => array_merge(
                $this->tags,
                $this->customTags ? array_map('trim', explode(',', $this->customTags)) : []
            ),
            'color' => $this->color,
            'demo_url' => $this->demo_url,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('projects', 'public');
        }

        $project->update($data);

        Flux::toast(variant: 'success', text: 'Project updated successfully.');
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        $this->projectId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Project::findOrFail($this->projectId)->delete();
        Flux::toast(variant: 'success', text: 'Project deleted successfully.');
        $this->confirmingDelete = false;
        $this->projectId = null;
    }

    public function moveUp($id)
    {
        $items = Project::orderBy('sort_order')->orderBy('id')->get();
        $keys = $items->keyBy('id');
        $ids = $items->pluck('id')->values()->toArray();
        $pos = array_search((int) $id, $ids);

        if ($pos > 0) {
            $ids[$pos] = $ids[$pos - 1];
            $ids[$pos - 1] = (int) $id;
        }

        foreach ($ids as $i => $itemId) {
            $keys[$itemId]->updateQuietly(['sort_order' => $i + 1]);
        }
    }

    public function moveDown($id)
    {
        $items = Project::orderBy('sort_order')->orderBy('id')->get();
        $keys = $items->keyBy('id');
        $ids = $items->pluck('id')->values()->toArray();
        $pos = array_search((int) $id, $ids);

        if ($pos < count($ids) - 1) {
            $ids[$pos] = $ids[$pos + 1];
            $ids[$pos + 1] = (int) $id;
        }

        foreach ($ids as $i => $itemId) {
            $keys[$itemId]->updateQuietly(['sort_order' => $i + 1]);
        }
    }

    public function render()
    {
        return view('livewire.projects', [
            'projects' => Project::orderBy('sort_order')->orderBy('id')->paginate(10),
            'allSkills' => Skill::orderBy('sort_order')->pluck('name')->toArray(),
        ]);
    }
}
