$(function() {
 $("#basicExample").DataTable({
  iDisplayLength: 10
 })
 $(".basicExample2").DataTable(
  {
  iDisplayLength: 10
 })
}), $(function() {
 $("#autoFill").DataTable({
  autoFill: !0,
  iDisplayLength: 10
 })
}), $(function() {
 $("#fixedHeader").DataTable({
  fixedHeader: !0,
  iDisplayLength: 10
 })
}), $(function() {
 $("#responsiveTable").DataTable({
  responsive: !0,
  iDisplayLength: 10
 })
}), $(function() {
 $(".scrollTable").DataTable({
  scrollY: "200px",
  scrollCollapse: !0,
  paging: !1,
  iDisplayLength: 10
 })
});