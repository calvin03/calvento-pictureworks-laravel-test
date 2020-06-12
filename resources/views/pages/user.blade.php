@extends('layouts.app')

@section('content')

<div class="container">
    <p class="text-center"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png" style="height: 70px"></p>
    <h4 class="text-center">{{$user->name}}</h4>

    {{-- checking if there are errors --}}
    @if ($errors->any())
     @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
     @endforeach
    @endif

    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">{!! \Session::get('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Comment</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->comments as $comment)
            <tr>
                <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;" width="60%">{{$comment->comment_description}}</td>
                <td>{{$comment->created_at->format('F d, Y')}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <form action="{{ route("add_comment") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Add Comment</label>
            <textarea class="form-control" name="comment" id="comment" rows="3">{{old('comment')}}</textarea>
        </div>

        <div class="form-group col-xs-4">
            <label for="password">Password</label>
            <input type="hidden" class="form-control" name="id" id="id" value="{{$user->id}}">
            <input type="password" class="form-control" name="password" id="password" placeholder="type your password">
        </div>
        <p class="text-right"><button type="submit" class="btn btn-primary">Add Comment</button></p>
      </form>
</div>

@endsection
