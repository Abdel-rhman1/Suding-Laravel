
<script>
    $('#navId a').click(e => {
        e.preventDefault();
        $(this).tab('show');
    });
</script>
<script src="{{asset('js/app.js')}}"></script>
<script src='{{asset('js/jquery-1.11.1.js')}}'></script>
<script src='{{asset('js/backend.js')}}'></script>
</body>
</html>