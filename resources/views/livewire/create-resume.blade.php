<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    
    <livewire:Navbar />
    <div class="card text-center" style="width: 50%; margin: auto auto; height: 100%; margin-top: 20px;">
        <div class="card-header">
            Resume Template
        </div>
        <form wire:submit="save">
            <div class="card-body">
                <!-- name -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">👀</span>
                    <input type="text" class="form-control" placeholder="say my NAME you know who I am" 
                    aria-label="Name" aria-describedby="basic-addon1"
                    wire:model="name"
                    >
                </div>

                <!-- email -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">📨</span>
                    <input type="text" class="form-control" placeholder="Your mail here!" 
                    aria-label="Name" aria-describedby="basic-addon1"
                    wire:model="email"
                    >
                </div>

                <!-- phone -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">📞</span>
                    <input type="text" class="form-control" placeholder="Call me maybe?" 
                    aria-label="Name" aria-describedby="basic-addon1"
                    wire:model="phone"
                    >
                </div>

                <!-- social media -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">👔</span>
                    <input type="text" class="form-control" placeholder="DM me thru social media!" 
                    aria-label="Name" aria-describedby="basic-addon1"
                    wire:model="social"
                    >
                </div>

                <!-- education -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">👨🏻‍🏫</span>
                    <input type="text" class="form-control" placeholder="Where did u graduate from?" 
                    aria-label="Name" aria-describedby="basic-addon1"
                    wire:model="education"
                    >
                </div>

                <!-- skills -->
                <div class="input-group mb-3">
                    <span class="input-group-text">Skills</span>
                    <textarea class="form-control" aria-label="self-introduction"
                    placeholder="Show me what you got 👊"
                    wire:model="skills"
                    ></textarea>
                </div>

                <!-- language -->
                <div class="input-group mb-3">
                    <span class="input-group-text">Languages</span>
                    <textarea class="form-control" aria-label="self-introduction"
                            placeholder="I speak Parseltongue🐍"
                            wire:model="language"
                    ></textarea>
                </div>

                <!-- self introduction -->
                <div class="input-group">
                    <span class="input-group-text">Self Intro</span>
                    <textarea class="form-control" aria-label="self-introduction"
                            placeholder="Briefly introduce yourself!"
                            wire:model="selfIntro"
                    ></textarea>
                </div>
            </div>

            <!-- submit button -->
            <div class="card-footer text-body-secondary">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        
    </div>
</div>
