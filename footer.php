  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="resources/semantic/semantic.min.js"></script>
  <script type="text/javascript" charset="utf8" src="resources/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="resources/js/dataTables.semanticui.min.js"></script>
  <script type="text/javascript">
  $(document).ready( function () {
    $('#table1').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Indonesian.json'
      }
    });
    $('.ui.dropdown').dropdown();
    $('.ui.modal').modal('attach events', '.tambah.button', 'show');
    $('.ui.search')
    .search({
      source : content,
    searchFields   : [
      'title'
    ],
    searchFullText: false
    });
  } );
  </script>
</body>
</html>
