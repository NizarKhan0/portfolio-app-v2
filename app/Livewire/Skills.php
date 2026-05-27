<?php

namespace App\Livewire;

use App\Models\Skill;
use Flux\Flux;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Skills')]
class Skills extends Component
{
    use WithPagination;

    public $name = '';
    public $skillId = null;
    public $showModal = false;
    public $confirmingDelete = false;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function resetForm()
    {
        $this->name = '';
        $this->skillId = null;
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
        Skill::create(['name' => $this->name]);
        Flux::toast(variant: 'success', text: 'Skill created successfully.');
        $this->resetForm();
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        $this->skillId = $skill->id;
        $this->name = $skill->name;
        $this->showModal = true;
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();
        Skill::findOrFail($this->skillId)->update(['name' => $this->name]);
        Flux::toast(variant: 'success', text: 'Skill updated successfully.');
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        $this->skillId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Skill::findOrFail($this->skillId)->delete();
        Flux::toast(variant: 'success', text: 'Skill deleted successfully.');
        $this->confirmingDelete = false;
        $this->skillId = null;
    }

    public function render()
    {
        return view('livewire.skills', [
            'skills' => Skill::latest('sort_order')->paginate(10),
        ]);
    }
}
