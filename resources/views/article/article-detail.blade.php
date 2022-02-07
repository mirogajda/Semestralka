@extends('common.master')

@section('main')
    <div class="content-start">

        <div class="article-detail">
            <div class="image">
                <img src="data:image/jpeg;base64,{{base64_encode($article->picture)}}" alt="">
            </div>

            <div class="title">
                <h2>{{$article->name}}</h2>
            </div>

            <div class="description">
                {!! $article->description !!}
            </div>


            <div class="comments">
                @foreach($article->comments as $comment)
                    <div class="comment">
                        <div class="user">
                            <img src="{{url('images/avatar.png')}}" alt="">
                            <div class="user-name">
                                {{$comment->name ?? ''}} |
                                Pridané: {{date('d. m. Y H:m', strtotime($comment->created_at))}}
                            </div>
                            @if(auth()->id() === $comment->user_id)
                                <div class="user-action">
                                    <button class="btn btn-link update">Upraviť</button>
                                    <button class="btn btn-link delete">Vymazať</button>
                                    <button class="btn btn-link cancel" hidden>Zrušiť</button>
                                </div>
                            @endif
                        </div>

                        <div class="content">
                            {{$comment->content ?? ''}}
                        </div>

                        <div hidden class="editable-content">
                            <form action="{{route('update-comment')}}" method="post">
                                @csrf
                                <input type="text" name="id" hidden value="{{$comment->id}}">
                                <div class="form-group">
                                    <textarea name="content" cols="30" rows="4" class="flex-grow-1">{{$comment->content ?? ''}}</textarea>
                                </div>
                                <button class="btn btn-primary">Uprav</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                @if(auth()->check())
                    <div class="comment">
                        <form action="{{route('store-comment')}}" method="post">
                            @csrf
                            <input type="text" hidden value="{{$article->id}}" name="article_id">
                            <div class="form-group">
                                <label>Pridaj komentár</label>
                                <textarea name="content" cols="30" rows="4" class="flex-grow-1"></textarea>
                            </div>
                            <button class="btn btn-primary">Pridaj</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.update').on('click', function (event) {

            const commentElement = $(event.target).parent().parent().parent();
            const controlButtons = $(commentElement).find('.user-action');

            //zobrazi komentare ako v div elemente kde sa nedaju editovat
            function showStaticContent() {
                $('.content').each(function () {
                    $(this).show();
                });
            }

            //ak je niektory z komentarov v editovacom mode(ako textarea) tak ju skryje
            function hideEditableContent() {
                $('.editable-content').each(function () {
                    $(this).hide();
                });
            }

            //talcidlo zrusit skryje a zobrazi tlacidla upravit a vymazat
            function restoreButtonState() {
                $('.comment').find('.user-action').children().each(function () {
                    if ($(this).hasClass('cancel')) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            }

            //zgrupenie vyssie zapisanych funkcii do jedej
            function cancelEditableModeOnAllNodes() {
                showStaticContent();
                hideEditableContent();
                restoreButtonState();
            }

            //vytvori zalohu needitovatelnej casti komentaru a ak sa uzivatel rozhodne zrusit upravu vrati povodny obsah do textarii
            function returnOriginalContent() {
                const textarea = $(commentElement).find("textarea[name='content']");
                const originalText = $(commentElement).find('.content').text().trim();
                textarea.val(originalText);
            }

            function hideUpdateAndRemoveButton() {
                controlButtons.children().each(function () {
                    if ($(this).hasClass('update') || $(this).hasClass('delete')) {
                        $(this).hide();
                    }
                })
            }

            function showCancelButton() {
                const cancelBtn = controlButtons.find('.cancel');
                cancelBtn.show();

                cancelBtn.on('click', function () {
                    controlButtons.children().each(function () {
                        $(this).show()
                    });
                    $(this).hide();
                    returnOriginalContent();
                    cancelEditableModeOnAllNodes();
                })
            }

            function createCommentEditable() {
                cancelEditableModeOnAllNodes();
                hideUpdateAndRemoveButton();
                showCancelButton();

                $(commentElement).find('.content').hide();
                $(commentElement).find('.editable-content').show();
            }

            createCommentEditable();

            $(commentElement).find('.btn.btn-primary').on('click', function (event) {
                event.preventDefault();
                const data = {
                    _token: '{{csrf_token()}}',
                    id: $(commentElement).find("input[name='id']").val(),
                    content: $(commentElement).find("textarea[name='content']").val(),
                };

                $.ajax({
                    type: 'POST',
                    url: '{{route('update-comment')}}',
                    data,
                    success: function (payload) {
                        $(commentElement).find('.content').html(data.content);
                        cancelEditableModeOnAllNodes();
                    },
                    error: function (payload) {
                        throw new Error('Occurred error during request.');
                    },
                })
            });
        });

        $('.delete').on('click', function (event) {
            event.preventDefault();

            if (!confirm('Naozaj chceš vymazať komentár?')) {
                return;
            }

            const parentWrapper = $(event.target).parent().parent().parent();
            const data = {
                _token: '{{csrf_token()}}',
                id: $(parentWrapper).find("input[name='id']").val(),
            };

            $.ajax({
                type: 'DELETE',
                url: '{{route('remove-comment')}}',
                data,
                success: function () {
                    parentWrapper.remove();
                },
                error: function () {
                    throw new Error('Occurred error during request.');
                },
            })
        });
    </script>
@endsection
