@if(Session::has('message'))
    <div id="notification" class="notification">
        @foreach(session('message') as $message)
            {{$message}}
        @endforeach

        <span>x</span>
    </div>

    <script type="text/javascript">
        const notification = $('#notification');
        notification.show();

        function removeNotification() {
            notification.hide();
            $.get(`${window.location.origin}/clear-message`, () => {});
        }

        $('span').on('click', function (event) {
            removeNotification();
        })

        setTimeout(() => removeNotification(), 10000);
    </script>
@endif
