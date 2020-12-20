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
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea type="text" rows="12" class="form-control" id="description" placeholder="Ingrese descripción" wire:model="description"></textarea>
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Tipo</label>
                        <select class="w-full text-left border-gray-500  duration-200 block px-4 py-2 text-normal text-gray-900 rounded  " wire:model="kind_id" type="text" class="form-control" id="tipo"  >
                            <option value="0"><a  >Ingrese una opción</a></option>
                            @foreach ($kinds as $kind)
                        <option value="{{$kind->id}}"><a  class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('kind_id', {{$kind->id}})">{{$kind->name}}</a></option>
                            @endforeach
                            
                        </select>
                        @error('kind_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Hábitat</label>
                        <select class="w-full text-left border-gray-500  duration-200 block px-4 py-2 text-normal text-gray-900 rounded  " wire:model="habitat_id" type="text"  class="form-control" id="tipo"  >
                            <option value="0"><a  >Ingrese una opción</a></option>
                            @foreach ($habitats as $habitat)
                        <option value="{{$habitat->id}}"><a  wire:click="$set('habitat_id', {{$habitat->id}})">{{$habitat->name}}</a></option>
                            @endforeach
                            
                        </select>
                        @error('habitat_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                   
                   
                
                 
                    
                    
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" class=" bg-cool-gray-500 text-white font-bold px-4 py-2 rounded mb-2 hover:bg-gray-700 close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="bg-primary text-white font-bold px-4 py-2 rounded   mb-2 hover:bg-blue-700 close-modal">Guardar</button>
            </div>
        </form>
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
                <form >
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese tipo" wire:model="name">
                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea type="text" rows="12" class="form-control" id="description" placeholder="Ingrese tipo" wire:model="description"> </textarea>
                    @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="description">Tipo</label>
                    <select class="w-full text-left border-gray-500  duration-200 block px-4 py-2 text-normal text-gray-900 rounded  " wire:model="kind_id" type="text" class="form-control" id="tipo"  >
                        <option value="0"><a  >Ingrese una opción</a></option>
                        @foreach ($kinds as $kind)
                    <option value="{{$kind->id}}"><a  class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('kind_id', {{$kind->id}})">{{$kind->name}}</a></option>
                        @endforeach
                        
                    </select>
                    @error('kind_id') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="description">Hábitat</label>
                    <select class="w-full text-left border-gray-500  duration-200 block px-4 py-2 text-normal text-gray-900 rounded  " wire:model="habitat_id" type="text"  class="form-control" id="tipo"  >
                        <option value="0"><a  >Ingrese una opción</a></option>
                        @foreach ($habitats as $habitat)
                    <option value="{{$habitat->id}}"><a  wire:click="$set('habitat_id', {{$habitat->id}})">{{$habitat->name}}</a></option>
                        @endforeach
                        
                    </select>
                    @error('habitat_id') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="">Imágen</label>
                    <img src="{{Storage::url($urll)}}" alt="">
                    
                    
                   
                    </div>
                <form wire:submit.prevent="save">
                <div class="form-group">
                    
                        <input type="file" wire:model="images" multiple>
                       
                </div>
                <button wire:click.prevent="save()" class="bg-primary text-white font-bold px-4 py-2 rounded   mb-2 hover:bg-blue-700" data-dismiss="modal">Actualizar</button>
                </form>
                
               
         
            
                
                
                
            
        </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="bg-cool-gray-500 text-white font-bold px-4 py-2 rounded mb-2 hover:bg-gray-700 close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="bg-primary text-white font-bold px-4 py-2 rounded   mb-2 hover:bg-blue-700" data-dismiss="modal">Guardar cambios</button>
            </div>
        </form>
       </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="updateImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">

                    <input type="file" wire:model="images" multiple>
                  
              
               
                   
             
                
                
                
            
        </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="bg-cool-gray-500 text-white font-bold px-4 py-2 rounded mb-2 hover:bg-gray-700 close-btn" data-dismiss="modal">Cerrar</button>
                <button type="submit" wire:click.prevent="save()" class="bg-primary text-white font-bold px-4 py-2 rounded   mb-2 hover:bg-blue-700" data-dismiss="modal">Guardar cambios</button>
            </div>
        </form>
       </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="feature" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Características</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">

                    
                   
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ingrese una característica nueva</label>
                        <input type="text" class="form-control mb-2" id="exampleFormControlInput1" placeholder="Ingrese características" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                        
                    </div>
                  
              
                
               
                    
             
                
                
                
            
        </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="bg-cool-gray-500 text-white font-bold px-4 py-2 rounded mb-2 hover:bg-gray-700 close-btn" data-dismiss="modal">Cerrar</button>
                <button type="submit" wire:click.prevent="storeFeature()" class="bg-primary text-white font-bold px-4 py-2 rounded   mb-2 hover:bg-blue-700" data-dismiss="modal">Agregar</button>
            </div>
        </form>
       </div>
    </div>
</div>

<!--Ver-->
<div wire:ignore.self class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea type="text" rows="12" class="form-control" id="description" placeholder="Ingrese descripción" wire:model="description"></textarea>
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Tipo</label>
                        <select class="w-full text-left border-gray-500  duration-200 block px-4 py-2 text-normal text-gray-900 rounded  " wire:model="kind_id" type="text" class="form-control" id="tipo"  >
                            <option value="0"><a  >Ingrese una opción</a></option>
                            @foreach ($kinds as $kind)
                        <option value="{{$kind->id}}"><a  class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('kind_id', {{$kind->id}})">{{$kind->name}}</a></option>
                            @endforeach
                            
                        </select>
                        @error('kind_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Hábitat</label>
                        <select class="w-full text-left border-gray-500  duration-200 block px-4 py-2 text-normal text-gray-900 rounded  " wire:model="habitat_id" type="text"  class="form-control" id="tipo"  >
                            <option value="0"><a  >Ingrese una opción</a></option>
                            @foreach ($habitats as $habitat)
                        <option value="{{$habitat->id}}"><a  wire:click="$set('habitat_id', {{$habitat->id}})">{{$habitat->name}}</a></option>
                            @endforeach
                            
                        </select>
                        @error('habitat_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        
                    <img src="{{Storage::url($urll)}}" alt="">
                    
                    
                   
                    </div>
                   
                   
                
                 
                    
                    
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="bg-cool-gray-500 text-white font-bold px-4 py-2 rounded mb-2 hover:bg-gray-700 close-btn" data-dismiss="modal">Cerrar</button>
               
            </div>
        </form>
        </div>
    </div>
</div>