jQuery(document).ready(function ($) {

  const submissions = [
    { id: 1, name: "John Doe", email: "john@example.com", session: "45644354", date: "12/08/2023" },
    { id: 2, name: "Jane Smith", email: "jane@example.com", session: "45433543", date: "12/08/2023" },
    { id: 3, name: "Joshia Smith", email: "joshia@example.com", session: "45433553", date: "12/08/2023" },
    { id: 4, name: "Janet Smith", email: "janet@example.com", session: "45437543", date: "12/08/2023" },
    { id: 5, name: "Joseph Smith", email: "joseph@example.com", session: "45483543", date: "12/08/2023" },
    // Add more submissions...
  ];

  const submissionTable = $("#submissionTable");

  submissions.forEach(submission => {
    const row = $("<tr></tr>");
    row.append(`<td>${submission.id}</td>`);
    row.append(`<td>${submission.name}</td>`);
    row.append(`<td>${submission.email}</td>`);
    row.append(`<td>${submission.session}</td>`);
    row.append(`<td>${submission.date}</td>`);
    submissionTable.append(row);
  });

  $(function () {
    $('#cp1').colorpicker();
  });

});