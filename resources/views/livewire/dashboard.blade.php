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
                <a href="#" class="btn btn-primary">Resume Archive</a>
            </div>
        </div>
        @if(session('createdResume'))
            <div class="alert alert-success">
                {{ session('createdResume') }}
            </div>
        @endif
        <div class="card" style="margin: 5rem 5rem;">
            <div class="card-header">
                STRAT FROM HERE!
            </div>
            <div class="card-body" >
                <blockquote class="blockquote mb-0" >
                <p>A well-known quote, contained in a blockquote element.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
    
</div>
