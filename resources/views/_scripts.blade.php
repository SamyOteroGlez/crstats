<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/cr-1.5.2/r-2.2.5/datatables.min.js"></script>

<script>

    $(window).ready(function () {

        $('#locale').val($('#set-locale').val());

        var locale = localStorage.getItem('locale', locale);

        if (locale) {
            $('#meta-locale').attr('content', locale);
            $('#set-locale').val(locale);
            $('#locale').val(locale);
        }

        $('#set-locale').on('change', function () {
            var new_locale = $('#set-locale').val();

            localStorage.setItem('locale', new_locale);
            $('#meta-locale').attr('content', new_locale);
            $('#locale').val(new_locale);
        });
    });

</script>
