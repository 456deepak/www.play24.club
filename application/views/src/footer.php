   <!-- content -->
   <footer class="footer">© <?= date("Y").' '. PROJECT_NAME ?> <span class="d-none d-sm-inline-block">- Crafted with <i
               class="mdi mdi-heart text-danger"></i> by <?= COMPANY_NAME ?></span>.</footer>
   </div>
   <!-- ============================================================== -->
   <!-- End Right content here -->
   <!-- ============================================================== -->
   </div>
   <!-- END wrapper -->
   <!-- jQuery  -->

   <script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
   <script src="<?= base_url('assets/js/metisMenu.min.js')?>"></script>
   <script src="<?= base_url('assets/js/jquery.slimscroll.js')?>"></script>
   <script src="<?= base_url('assets/js/waves.min.js')?>"></script>

   <script src="<?= base_url('assets/js/jquery.validate.min.js')?>"></script>
   <!-- Required datatable js -->
   <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
   <!-- Buttons examples -->
   <script src="<?= base_url('assets/plugins/datatables/dataTables.buttons.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.bootstrap4.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/jszip.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/pdfmake.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/vfs_fonts.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.html5.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.print.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/buttons.colVis.min.js')?>"></script>
   <!-- Responsive examples -->
   <script src="<?= base_url('assets/plugins/datatables/dataTables.responsive.min.js')?>"></script>
   <script src="<?= base_url('assets/plugins/datatables/responsive.bootstrap4.min.js')?>"></script>
   <!-- Datatable init js -->
   <script src="<?= base_url('assets/plugins/datatables/datatables.init.js')?>"></script>
   <!-- App js -->
   <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>
   <script src="<?= base_url('assets/js/app.js')?>"></script>
   <script src="<?= base_url('assets/js/custom/validation.js')?>"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
   <script>
      $(function() {
         var start = moment(<?= ($this->input->get('start_date') != '') ? '"' . $this->input->get('start_date') . '"' : ''; ?>);
         var end = moment(<?= ($this->input->get('end_date') != '') ? '"' . $this->input->get('end_date') . '"' : ''; ?>);
         // alert(start)
         function cb(start, end) {
            $('#report span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            var start_date = start.format('YYYY-MM-DD')
            var end_date = end.format('YYYY-MM-DD')
            //   alert(start_date);
            $('#sn_date').val(start_date);
            $('#en_date').val(end_date);

         }

         $('#report').daterangepicker({
            maxDate: new Date(),
            startDate: start,
            endDate: end,
            //    maxDate: d,                      
            ranges: {
                  'Today': [moment(), moment()],
                  'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                  'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                  'This Month': [moment().startOf('month'), moment().endOf('month')],
                  'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                     .endOf('month')
                  ]
            },

         }, cb);
         cb(start, end);


      })
   </script>
   </body>

   </html>