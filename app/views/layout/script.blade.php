    <!-- Javascript -->
    {{ HTML::script('assets/jquery/jquery.min.js') }}
    {{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('assets/bootstrap-material-design/js/ripples.min.js') }}
    {{ HTML::script('assets/bootstrap-material-design/js/material.min.js') }}

    <script>
        $(function() {
            $.material.init();
        });
    </script>