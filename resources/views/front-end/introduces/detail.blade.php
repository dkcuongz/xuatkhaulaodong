@extends('layouts.frontend')

@section('title', 'Giới thiệu')

@section('content_header')
    <h1 class="m-0 text-dark">Giới thiệu</h1>
@stop

@section('content')
    <div id="content" class="content-area page-wrapper" role="main">
        <div class="row row-main">
            <div class="large-12 col">
                <div class="col-inner">
                    {!! $introduce->description ?? '' !!}
                    <div id="comments" class="comments-area">
                        <div id="respond" class="comment-respond">
                            <form action="{{route('front.lien-he.store')}}" method="post"
                                  id="commentform" class="comment-form" novalidate>
                                <div class="form-group">
                                    <p class="comment-notes">
                                        <span id="email-notes">Email của bạn sẽ không được hiển thị công khai.</span>
                                        <span class="required-field-message" aria-hidden="true">Các trường bắt buộc được đánh dấu
                                        <span class="required" aria-hidden="true">*</span>
                                    </span>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p class="comment-form-comment">
                                        <label for="comment">Bình luận
                                            <span class="required" aria-hidden="true">*</span>
                                        </label>
                                        <textarea id="comment"
                                                  class=" form-control @error('content') is-invalid @enderror"
                                                  name=" content"
                                                  cols="45" rows="8" maxlength="65525"
                                                  required></textarea>
                                        @error('content') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p class="comment-form-author">
                                        <label for="author">Tên
                                            <span class="required" aria-hidden="true">*</span>
                                        </label>
                                        <input id="author" class=" form-control @error('name') is-invalid @enderror"
                                               name="name" type="text" value="" size="30" maxlength="245"
                                               required/>
                                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p class="comment-form-email">
                                        <label for="email">Email
                                            <span class="required" aria-hidden="true">*</span>
                                        </label>
                                        <input id="email" class=" form-control @error('name') is-invalid @enderror"
                                               name="email" type="email" value="" size="30" maxlength="100"
                                               aria-describedby="email-notes" required/>
                                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                </div>
                                <div class="form-group">
                                    <p class="comment-form-url"><label for="url">Trang web</label>
                                        <input id="url"
                                               name="website"
                                               class=" form-control @error('website') is-invalid @enderror"
                                               type="url"
                                               value=""
                                               size="30"
                                               maxlength="200"/>
                                        @error('website') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                </div>
                                <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit"
                                           value="Phản hồi"/>
                                </p></form>
                            </form>
                        </div><!-- #respond -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
