<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <livewire:Navbar />
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
    </div>
</div>
