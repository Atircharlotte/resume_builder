<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <livewire:Navbar />
    <div style="display: flex;">
        <div class="card" style="width: 18rem; margin: 5rem 5rem;">
            <img src="{{ $githubUser->avatar_url }}" class="card-img-top" alt="user-avatar">
            <div class="card-body">
                <h5 class="card-title">Hello {{ $githubUser->nickname }}👋</h5>
                <p class="card-text">Create your RESUME in resume builder right away!</p>
                <p>Best luck for finding your ideal job 👊</p>
                <button type="button" class="btn btn-primary" wire:click="CreatePage">Create my Resume</button>
                <br/>
                <br/>
            </div>
        </div>
        @if(session('createdResume'))
            <div class="alert alert-success">
                {{ session('createdResume') }}
            </div>
        @endif
        <div class="card" style="margin: 5rem 5rem; width: 40%;" >
            <div class="card-header">
                <h1>Resume Archive📂</h1>
            </div>
            <!-- list of resumes created -->
            <div class="card-body" >
                <div class="d-grid gap-3" style="overflow: scroll;">
                    @if (count($resumes) > 0)
                        @foreach ($resumes as $resume)
                            <a class="btn btn-dark" type="button" href="/resume/{{ $resume->id }}">
                                <h5 style="float: left;">Resume</h5>  
                                <small>
                                     <span style="float: right;">created at {{ $resume->created_at}}</span>
                                </small>
                            </a>
                        @endforeach
                    @else
                        <h4>There's no any resume created!</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>
