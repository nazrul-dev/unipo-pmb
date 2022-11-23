<div>
    <div class="w-1/2 mx-auto">
        <x-card>
            <x-inputs.password label="Password Baru " wire:model="password" />
            <x-slot name="footer">
                <div class="flex justify-between items-center">
                    
                    <x-button wire:click="save" label="Save" primary />
                </div>
            </x-slot>
        </x-card>
    </div>
</div>
