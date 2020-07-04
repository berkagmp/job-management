let Job = (function() {
    const validate_rule = {
        type_id: "required",
        location: "required",
        date: "required",
        time: "required",
        location: {
            required: true,
            maxlength: 255
        },
        price: {
            required: true,
            number: true
        }
    };

    $("#validateAddForm").validate({
        rules: validate_rule,
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#validateEditForm").validate({
        rules: validate_rule,
        submitHandler: function(form) {
            form.submit();
        }
    });

    $(document)
        .on("click", "#btn_edit", function(event) {
            axios
                .get("/api/jobs/" + $(this).data("id"))
                .then(response => {
                    const obj = jQuery.parseJSON(JSON.stringify(response.data));

                    let modal = $("#editModal");
                    modal.find("#id").val(obj.id);
                    modal.find("#date").val(obj.date);
                    modal.find("#time").val(obj.time);
                    modal.find("#location").val(obj.location);
                    modal.find("#price").val(obj.price);
                    modal
                        .find("#type_id option[value=" + obj.type_id + "]")
                        .attr("selected", "selected");
                })
                .then(() => {
                    $("#editModal").modal("show");
                })
                .catch(e => {
                    console.log(e);
                    alert("There was an error");
                });
        })
        .on("click", "#btn_delete", function(event) {
            event.preventDefault();

            if (!confirm("Are you sure you want to delete the job?")) {
                return;
            } else {
                $("#validateEditForm").attr("action", "/deletejob");
                $("#validateEditForm").submit();
            }
        });
})();
