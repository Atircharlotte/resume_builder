<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <livewire:Navbar />
    @if (!$editMode)
        <div class="card mb-3" 
                style="max-width: 800px; margin: auto auto;margin-top: 5em;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $githubUser->avatar_url }}" class="img-fluid rounded-start" alt="...">
                    
                    <div>
                        <div class="card-body">
                            <h4 class="card-title">
                                    Contact
                            </h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">📧{{ $resumeContent->email }}</li>
                                <li class="list-group-item">📞{{ $resumeContent->phone }}</li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">
                            {{ $resumeContent->name }}
                        </h1>
                        <p class="card-text">
                            {{ $resumeContent->selfIntro }}
                        </p>
                        <h4 class="card-title">
                            Education
                        </h4>
                        <p class="card-text">{{ $resumeContent->education }}</p>
                        <h4 class="card-title">
                            Skills
                        </h4>
                        <p class="card-text">{{ $resumeContent->skills }}</p>
                        <h4 class="card-title">
                            Languages
                        </h4>
                        <p class="card-text">{{ $resumeContent->language }}</p>
                        
                        <h4 class="card-title">
                            Reach out
                        </h4>
                        <p class="card-text">find me here👉<a href="{{ $resumeContent->social }}">My Social Media</a></p>
                    </div>
                </div>
                
            </div>
        </div>
        <div style="display: flex; float: right; margin-right: 20em">
            <button type="button" class="btn btn-danger"
                    style="margin-right: 2em;"
                    wire:click="delete"
                    wire:confirm="U wanna delete this resume? really🥺?"
            >Delete
            </button>
            <button type="button" class="btn btn-success"
                    style="margin-right: 2em;"
                    wire:click="edit"
            >Edit
            </button>
            <button type="button"
                class="btn btn-dark"
                wire:click="uploadToREADME"
            >Update to GitHub README</button>
            <!-- wire:click="uploadToREADME"  -->
        </div>
        
    @else   
        <div class="card mb-3" 
        style="max-width: 800px; margin: auto auto;margin-top: 1em; padding: 2em 2em;">
            <h1>You're now in EDIT mode!</h1> 
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
        <div style="display: flex; float: right; margin-right: 20em">
            <button type="button" class="btn btn-primary" 
                        style="width: 5em; margin-right: 2em;"
                        wire:click="saveEdition">
                        Save</button>
            <button type="button" class="btn btn-warning" 
                        style="width: 5em;"
                        wire:click="cancel">Cancel</button>
        </div>
        
    @endif

</div>
