@extends('layout.index')
@section('title')
{{$tin->TieuDe}}
@endsection
@section('content')
<h2>{{$tin->TieuDe}}</h2>
<img src="/images/{{$tin->Hinh}}" alt="" width="300px" />
<h3>{{$tin->TomTat}}</h3>
<div id="noidung">
    {!! $tin->NoiDung !!}
</div>
<p><span>Posted on: {{$tin->created_at}}</span></p>


<section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-start align-items-center">
              <div>
                @foreach($tin->comment as $cm)
                <h6 class="fw-bold text-primary mb-1">{{$cm->user->name}}</h6>
                <p class="text-muted small mb-0">
                  Shared publicly - Jan 2020
                </p>
              </div>
            </div>
             
            <p class="mt-3 mb-4 pb-2">
             {{$cm->NoiDung}}
            </p>

            <div class="small d-flex justify-content-start">
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-thumbs-up me-2"></i>
                <p class="mb-0">Like</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-comment-dots me-2"></i>
                <p class="mb-0">Comment</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="fas fa-share me-2"></i>
                <p class="mb-0">Share</p>
              </a>
            </div>
            @endforeach
          </div>
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
              </div>
            </div>
            <div class="float-end mt-2 pt-1">
              <button type="button" class="btn btn-primary btn-sm">Post comment</button>
              <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection