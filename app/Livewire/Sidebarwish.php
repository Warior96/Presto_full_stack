<?php

// app/Livewire/Sidebarwish.php
namespace App\Livewire;

use Livewire\Component;

class Sidebarwish extends Component
{
    public $isOpen = false;

    // Ascolta l'evento 'toggle-sidebar' che arriva dal JavaScript
    protected $listeners = ['toggleSidebar'];

    public function toggleSidebar()
    {
        // Alterna la visibilità della sidebar
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.sidebarwish');
    }
}
