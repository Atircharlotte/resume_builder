<div class="position-absolute top-50 start-50 translate-middle">
    {{-- The whole world belongs to you. --}}
    <img alt="portfolio-builder" class="img-thumbnail" src="/images/meme.jpg"/>
   
    <div>
        <h1>RESUME BUILDER</h1>
    <!-- <form>
        <div class="mb-3">
            <label for="account" class="form-label" aria-describedby="emailHelp">Account or Email</label>
            <input type="text" class="form-control" id="account"/>
            <div id="emaillHelp" class="form-text">Login in via GitHub account</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password"/>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form> -->
    @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
    @endif
    
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <figure>
            <blockquote class="blockquote">
                <p>Create your own resume via resume builder!</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                For ITHOME 2024 小專案 BY 阿寶
            </figcaption>
        </figure>
        <button type="button" class="btn btn-secondary btn-lg" wire:click="login">Login via GitHub</button>
    </div>
    
    </div>
    
</div>
