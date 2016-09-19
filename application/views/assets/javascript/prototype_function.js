function save_selector(self) {
    //var form_id = self.form.id; // get id form by this.
    var form_id = self.getAttribute('form');
    var value = self.getAttribute('value');

    var button_value = $("<input type='hidden'/>");
    button_value.attr("name", "save");
    button_value.attr("value", value); // get value save or save_stay
    button_value.appendTo("#" + form_id);

    $("#" + form_id).submit();
    button_value.remove();
}


