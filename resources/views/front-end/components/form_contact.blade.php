<div id="comments" class="comments-area">
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">Trả lời</h3>
        <form action="{{route('front.lien-he.store')}}" method="post"
              id="commentform" class="comment-form" novalidate>
            <div class="form-group">
                <p class="comment-notes">
                    <span id="email-notes">Email của bạn sẽ không được hiển thị công khai.</span>
                    <span class="required-field-message" aria-hidden="true">Các trường bắt buộc được đánh dấu <span
                            class="required" aria-hidden="true">*</span></span></p>
            </div>
            <div class="form-group">
                <p class="comment-form-comment">
                    <label for="comment">Bình luận <span class="required" aria-hidden="true">*</span></label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
                              cols="45" rows="8" maxlength="65525" required></textarea>
                    @error('content') <span class="text-danger">{{$message}}</span> @enderror
                </p>
            </div>
            <div class="form-group">
                <p class="comment-form-author"><label for="author">Tên <span class="required"
                                                                             aria-hidden="true">*</span></label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
                           value="" size="30" maxlength="245"
                           required/>
                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </p>
            </div>
            <div class="form-group">
                <p class="comment-form-email">
                    <label for="email">Email <span class="required" aria-hidden="true">*</span></label>
                    <input id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           type="email"
                           value="" size="30" maxlength="100"
                           aria-describedby="email-notes" required/>
                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                </p>
            </div>
            <div class="form-group">
                <p class="comment-form-url"><label for="url">Trang web</label>
                    <input id="website"
                           class="form-control @error('website') is-invalid @enderror"
                           name="website"
                           type="url"
                           value="" size="30"
                           maxlength="200"/>
                    @error('website') <span class="text-danger">{{$message}}</span> @enderror
                </p>
            </div>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="submit"
                       value="Phản hồi"/>
            </p></form>
    </div>
</div>
