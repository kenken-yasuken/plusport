$(function() {
    get_data();
});

function get_data() {
    $.ajax({
        url: "result/ajax/",//ここでバックエンドにリクエストしてる=APIを叩いている
        dataType: "json",
        data: { //バックエンドへのリクエストに含めるパラメータを定義する
            login_id: $("#login_id").val(),// bladeからhiddenで渡ってきたパラメータを変数につめる
            partner_id: $("#partner_id").val()
        },//　あくまでもリクエスト処理はここで終わる
        //ここからはレスポンスを受けた処理
        success: data => {
            $("#comment-data")
                .find(".comment-visible")
                .remove();

            for (var i = 0; i < data.comments.length; i++) {
                var html = `
                            <div class="media comment-visible">
                                <div class="media-body comment-body">
                                    <div class="row">
                                        <span class="comment-body-user" id="name">${data.comments[i].name}</span>
                                        <span class="comment-body-time" id="created_at">${data.comments[i].created_at}</span>
                                    </div>
                                    <span class="comment-body-content" id="comment">${data.comments[i].comment}</span>
                                </div>
                            </div>
                        `;

                $("#comment-data").append(html);
            }
        },
        error: () => {
            alert("ajax Error");
        }
    });

    setTimeout("get_data()", 5000);
}