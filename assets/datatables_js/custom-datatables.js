$(function() {
 $("#basicExample").DataTable({
  iDisplayLength: 5
 })
 $(".basicExample2").DataTable(
  {
  iDisplayLength: 5
 })
}), $(function() {
 $("#autoFill").DataTable({
  autoFill: !0,
  iDisplayLength: 5
 })
}), $(function() {
 $("#fixedHeader").DataTable({
  fixedHeader: !0,
  iDisplayLength: 5
 })
}), $(function() {
 $("#responsiveTable").DataTable({
  responsive: !0,
  iDisplayLength: 5
 })
}), $(function() {
 $(".scrollTable").DataTable({
  scrollY: "200px",
  scrollCollapse: !0,
  paging: !1,
  iDisplayLength: 5
 })
});