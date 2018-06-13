@extends('layouts.index')

@section('content')
    <section class="row new-post">
         <div class=".col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="#">
                <div class="form-group">
                    <textarea class="form-control" name="new-post" id="new-post" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
         </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            <article class="post">
                <p>Some text here.</p>
                <div class="info">
                    Posted by Random guy.
                </div>
                <div class="interactions">
                    <a href="#">Like</a>
                    <a href="#">DisLike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>
            <article class="post">
                <p>Some text here.</p>
                <div class="info">
                    Posted by Random guy.
                </div>
                <div class="interactions">
                    <a href="#">Like</a>
                    <a href="#">DisLike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>
@endsection