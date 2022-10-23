var agentReq = new XMLHttpRequest();
var url = "https://totco.kakebe.com/api/api/users/listAllUsers.php?";
agentReq.open('GET', url, true);
agentReq.send();
agentReq.onreadystatechange = function() {
        if(this.readyState == 4 && agentReq.status == 200) {
            var dataset = JSON.parse(agentReq.responseText);

    var table = $('#agent-table').DataTable({
            paging: false,
            searching: false,
            "data": dataset.users,
            'columns': [
                {'data': 'user_credentials.user_id'},
                {'data': 'username'},
                {'data': 'firstname'},
                {'data': 'lastname'},
                {'data': 'email'},
            ],
        } );
    }
}
