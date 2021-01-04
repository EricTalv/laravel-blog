@extends('articles.show')

@section('comment-section')
    <div class="row w-75 ">
        <div class="col-12 p-0">
            <div class="comment-input mb-3 ">
                <div class="comment px-3 py-3 bg-white rounded">
                    <img src="https://picsum.photos/80" class="avatar float-left mr-2">
                    <div class="row">
                        <div class="comment-input-data w-100">
                            <div class="username font-weight-bold">William Shakesphear The Third<small
                                    class="text-muted small ml-2">12 Dec, 2020</small>
                            </div>
                            <div class="comment-text-input">
                                <form>
                                    <div class="form-group">
                                        <textarea class="form-control" class="comment-input" rows="5"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="comment-buttons float-right ">
                                <button class="btn btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments w-100">
            <div class="comment px-3 py-3 bg-white rounded">
                <img src="https://picsum.photos/80" class="avatar float-left mr-2">
                <div class="row">
                    <div class="comment-data">
                        <div class="username font-weight-bold">William Shakesphear The Third<small
                                class="text-muted small ml-2">12 Dec, 2020</small>
                        </div>
                        <div class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Consectetur consequuntur deleniti earum ex
                        </div>
                        <div class="comment-buttons float-right my-1 mr-4">
                            <button class="btn btn-outline-success">Like</button>
                            <button class="btn btn-outline-primary">Reply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
