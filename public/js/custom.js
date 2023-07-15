$(document).ready(function() {
    $('#filterForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        $("#filterData").html('Loading...')
        // Get form data and send AJAX request
        var formData = $(this).serialize();
        $.ajax({
            type: 'GET',
            url:$(this).attr("action"),
            data: formData,
            dataType: 'json',
            success: function(data) {

                var filterData = `<div class="table-responsive">
                <table id="bookingTableBody" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Participation ID</th>
                            <th>Employee Name</th>
                            <th>Employee Mail</th>
                            <th>Event ID</th>
                            <th>Event Name</th>
                            <th>Participation Fee</th>
                            <th>Event Date</th>
                        </tr>
                    </thead>
                    <tbody>`;

                $.each(data.bookings, function(index, booking) {
                    filterData += `
                      <tr>
                        <td>${booking.participation_id}</td>
                        <td>${booking.employee_name}</td>
                        <td>${booking.employee_mail}</td>
                        <td>${booking.event_id}</td>
                        <td>${booking.event_name}</td>
                        <td>${booking.participation_fee}</td>
                        <td style="white-space: nowrap">${booking.event_date}</td>
                      </tr>
                    `;

                });
                filterData += `<tr>
                        <td colspan="5" style="text-align: right;"><strong>Total:</strong></td>
                        <td>${data.totalPrice}</td>
                        <td></td>
                    </tr>
                </tbody></table></div>`;

                $("#filterData").html(filterData)
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('Error:', errorThrown);
            }
        });
    });
});
function reset_filter() {
    $('#filterForm')[0].reset()
    $('#filterForm').submit()
}