<div>
  
    <x-button   wire:click="$emit('refreshComponent')" icon="check" loading-delay="short" primary label="Save" />
    <x-card title="Users">
        @livewire('user-table')
    </x-card>
    <x-modal max-width="sm" x-on:open='$wire.formActive' blur wire:model.defer="formActive">
        <x-card title=" User">

            <div class="grid grid-cols-1 gap-3">
                <x-input label="Name" wire:model.defer="field.name" placeholder="your name" />
                <x-input label="Email" wire:model.defer="field.email" placeholder="your Email" />
                <x-inputs.password wire:model.defer="field.password" label="Password" />
            </div>
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button wire:click="save" spinner="save" icon="check" loading-delay="short" primary
                        label="Save" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

</div>
