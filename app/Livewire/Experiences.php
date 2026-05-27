<?php

namespace App\Livewire;

use App\Models\Experience;
use App\Models\Skill;
use Flux\Flux;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Experiences')]
class Experiences extends Component
{
    use WithPagination;

    public $role = '';
    public $company = '';
    public $period = '';
    public $description = '';
    public $tags = [];
    public $customTags = '';
    public $experienceId = null;
    public $showModal = false;
    public $confirmingDelete = false;

    protected $rules = [
        'role' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'period' => 'required|string|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|array',
        'customTags' => 'nullable|string',
    ];

    public function resetForm()
    {
        $this->role = '';
        $this->company = '';
        $this->period = '';
        $this->description = '';
        $this->tags = [];
        $this->customTags = '';
        $this->experienceId = null;
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

        Experience::create([
            'role' => $this->role,
            'company' => $this->company,
            'period' => $this->period,
            'description' => $this->description,
            'tags' => array_merge(
                $this->tags,
                $this->customTags ? array_map('trim', explode(',', $this->customTags)) : []
            ),
        ]);

        Flux::toast(variant: 'success', text: 'Experience created successfully.');
        $this->resetForm();
    }

    public function edit($id)
    {
        $exp = Experience::findOrFail($id);
        $this->experienceId = $exp->id;
        $this->role = $exp->role;
        $this->company = $exp->company;
        $this->period = $exp->period;
        $this->description = $exp->description;
        $this->tags = is_array($exp->tags) ? $exp->tags : [];
        $this->customTags = '';
        $this->showModal = true;
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();

        $exp = Experience::findOrFail($this->experienceId);
        $exp->update([
            'role' => $this->role,
            'company' => $this->company,
            'period' => $this->period,
            'description' => $this->description,
            'tags' => array_merge(
                $this->tags,
                $this->customTags ? array_map('trim', explode(',', $this->customTags)) : []
            ),
        ]);

        Flux::toast(variant: 'success', text: 'Experience updated successfully.');
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        $this->experienceId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Experience::findOrFail($this->experienceId)->delete();
        Flux::toast(variant: 'success', text: 'Experience deleted successfully.');
        $this->confirmingDelete = false;
        $this->experienceId = null;
    }

    public function render()
    {
        return view('livewire.experiences', [
            'experiences' => Experience::latest('sort_order')->paginate(10),
            'allSkills' => Skill::orderBy('sort_order')->pluck('name')->toArray(),
        ]);
    }
}
