<button type="button" class="bg-primary text-white font-bold px-4 py-2 rounded   mb-2 hover:bg-blue-700" data-toggle="modal" data-target="#exampleModal">
	Agregar
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Característica</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese característica" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class=" bg-cool-gray-500 text-white font-bold px-4 py-2 rounded mb-2 hover:bg-gray-700 close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="bg-primary text-white font-bold px-4 py-2 rounded   mb-2 hover:bg-blue-700 close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="feature_id">
                        <label for="exampleFormControlInput1">Característica</label>
                        <input type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="Enter Name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="bg-cool-gray-500 text-white font-bold px-4 py-2 rounded mb-2 hover:bg-gray-700 close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="bg-primary text-white font-bold px-4 py-2 rounded   mb-2 hover:bg-blue-700" data-dismiss="modal">Guardar cambios</button>
            </div>
       </div>
    </div>
</div>

