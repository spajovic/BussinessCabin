$('document').ready(function(){
    AOS.init();

    $('#login-btn').click(proveraLogin);
    $('#register-btn').click(proveraRegister);
    $('#sub-btn').click(proveraSubMail);
    $('.cat_link').click(showCategoryPosts);
    $('#searchBtn').click(showSearchPosts);
    $('.tag-links').click(showTagPosts);
    $('#comment-btn').click(proveraComment);
    // $('.btnPostDelete').click(obrisiPost);
    $('#message-btn').click(proveraTextMail);


    var lokacija = window.location.pathname;
    if(lokacija.includes('/admin/')){
        let filename = lokacija.split('/').pop();
        obeleziMenu(filename);
    }

});

function proveraTextMail(){
    let text = $('#emailMessage').val();
    let textProvera = /^[a-zđšžćčA-ZĐŠŽĆČ.,;!?:'\%\\\-\.]{1,} [a-zđšžćčA-ZĐŠŽĆČ.,:?;!]{1,} .+$/;

    if(!textProvera.test(text)){
        $('#emailMessage').css({
            'border':'1px solid red'
        })
        $('#labEmailText').html('Your message must include atleast 3 words');
        return false
    }
    else{
        $('#emailMessage').css({
            'border':'none'
        })
        $('#labEmailText').html('Message :');
        return true
    }
}




// function obrisiPost(e){
//     e.preventDefault();
//     let id = $(this).data('id');
//     $.ajax({
//         url:'/admin/posts/'+id,
//         method:'DELETE',
//         data:{
//             post:id
//         },
//         success:function (){
//             console.log('opa batoooo');
//         }
//     })
// }


function proveraComment(){
    let commentValue = $('#commentText').val();
    let proveraComment = /^[a-zđšžćčA-ZĐŠŽĆČ.,;!?:'\%\\\-\.]{1,} [a-zđšžćčA-ZĐŠŽĆČ.,:?;!]{1,} .+$/;

    if(!proveraComment.test(commentValue)){
        $('#commentText').css({
            'border':'1px solid red'
        })
        $('#labComment').html('Your comment must include at least 3 words');
        return false;
    }
    else{
        $('#commentText').css({
            'border':'none'
        })
        $('#labComment').html('Comment :');
        return true;
    }
}




function showTagPosts(e){
    e.preventDefault();
    let TagId = $(this).data('id');
    $.ajax({
        url:'/posts/fetch',
        method:'GET',
        data:{
            tag:TagId
        },
        dataType:'Json',
        success:function (data){
            ispisiPosts(data.data);
            createPagination(data.last_page,data.current_page,null,null,TagId);
        },
        error:function (err){
            console.log(err);
        }
    });
}


function showSearchPosts(){
    let value = $('#searchTxt').val();
    $.ajax({
        url:'/posts/fetch',
        method: 'GET',
        data: {
            search:value
        },
        dataType: 'Json',
        success:function (data){
            let brojPostova = data.data.length;
            if(brojPostova > 0){
                ispisiPosts(data.data);
                createPagination(data.last_page,data.current_page,null,value,null);
            }
            else{
                let ispis1 = `<h4>No results found...</h4>`
                $('.entries').html(ispis1);
            }
        },
        error:function (err){
            console.log(err);
        }
    })
}

function showCategoryPosts(e){
    e.preventDefault();
    let categoryId= $(this).data('id');

        $.ajax({
            url: '/posts/fetch',
            method:'GET',
            data:{
                category:categoryId
            },
            dataType:'json',
            success: function (data){
                ispisiPosts(data.data)
                createPagination(data.last_page,data.current_page,categoryId);
            },
            error:function (err){
                console.log(err);
            }
        });
}
function ispisiPosts(data){
    let ispis = ``;
    let pathname = window.location.pathname;
    data.forEach(function (el){
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        let date = new Date(el.created_at);
        let godina = date.getFullYear();
        let mesec = monthNames[date.getMonth()];
        let dan = date.getDate();
        let format = mesec+','+' '+dan+' '+godina;
        // console.log(format)
        ispis+=`
            <div class="entry">
                            <div class="entry-img">
                                <img src="storage/img/posts-img/${el.filename}" alt="Baby yoda" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                                <a href="posts/${el.id}">${el.heading}</a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class='bx bx-calendar-week'></i><a href="#"><time datetime="${el.created_at}">${format}</time></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>
                                    ${el.main_text.substring(0,220)+'...'}
                                </p>
                                <div class="read-more">
                                    <a href="posts/${el.id}">Read More</a>
                                </div>
                            </div>
                        </div>`
    });
    $('.entries').html(ispis);
}


function createPagination(totalLinks,currentPage,category_id = null,value = null,tagId = null){

    let ispis = `<div class="blog-pagination">
                    <ul class="justify-content-center">`;
    for(let i = 1; i <= totalLinks; i++){
        if(i != currentPage){
            ispis+= `<li class="page-item"><a class="paginateLink" href="#" data-page="${i}" id="link${i}">${i}</a></li>`
        }
        else{
            ispis+= `<li class="page-item active"><a class="paginateLink" href="#" data-page="${i}" id="link${i}">${i}</a></li>`
        }
    }
    ispis += `</ul></div>`;
    $('.entries').append(ispis);
    $('.paginateLink').click(function (){
        let page = $(this).data('page');
        getmoreFiltered(page,category_id,value,tagId);
    });
}
function getmoreFiltered(page,category_id = null,value = null,tagId = null){
    //Dohatanje dodatnih postova po kategoriji
    if(category_id != null){
        $.ajax({
            url: '/posts/fetch',
            method:'GET',
            data:{
                page:page,
                category:category_id
            },
            dataType:'json',
            success: function (data){
                ispisiPosts(data.data)
                createPagination(data.last_page,data.current_page,category_id);
            },
            error:function (err){
                console.log(err);
            }
        });
    }
    // Dohvatanje dodatnih postova kao search rezultat
    if(value != null){
        console.log(value)
        $.ajax({
            url:'/posts/fetch',
            method: 'GET',
            data: {
                search:value,
                page:page
            },
            dataType: 'Json',
            success:function (data){
                let brojPostova = data.data.length;
                if(brojPostova > 0){
                    ispisiPosts(data.data);
                    createPagination(data.last_page,data.current_page,null,value,null);
                }
                else{
                    let ispis1 = `<h4>No results found...</h4>`
                    $('.entries').html(ispis1);
                }
            },
            error:function (err){
                console.log(err);
            }
        })
    }
    //Dohvatanje dodatnih postova po tagovima
    if(tagId != null){
        console.log(tagId);
        $.ajax({
            url:'/posts/fetch',
            method:'GET',
            data:{
                page:page,
                tag:tagId
            },
            dataType:'Json',
            success:function (data){
                ispisiPosts(data.data);
                createPagination(data.last_page,data.current_page,null,null,tagId);
            },
            error:function (err){
                console.log(err);
            }
        });
    }
}

function obeleziMenu(filename){
    if($("#"+filename)){
        $("#"+filename).css({
            "background-color": "#f87842",
            "box-shadow":"0px 2px 15px rgba(0,0,0,0.1)"
        });
        $("#"+filename+" a").css({
            "color": "white",
        });
        $("#"+filename+" i").css({
            "color": "white"
        });
    }
}


function proveraLogin(){
    let email = $('#login-email').val();
    let password = $('#login-passwd').val();

    let emailProvera = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let passwordProvera = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;

    if(!emailProvera.test(email)){
        $('#login-email').css({
            'border':'1px solid red'
        })
        $('#login-emlab').html('Enter valid email address');
        return false;
    }
    else{
        $('#login-email').css({
            'border':'0'
        })
        $('#login-emlab').html('Email :');
    }
    if(!passwordProvera.test(password)){
        $('#login-passwd').css({
            'border':'1px solid red'
        })
        $('#login-passlab').html('At least 8 characters with one letter and one number');
        return false
    }
    else{
        $('#login-passwd').css({
            'border':'0'
        })
        $('#login-passlab').html('Password :');
    }
    return true
}

function proveraRegister(){
    let name = $('#register-name').val();
    let surname = $('#register-surname').val();
    let email = $('#register-email').val();
    let password = $('#register-passwd').val();
    let password1 = $('#register-passwd1').val();

    let textProvera = /^[A-ZĐŠČĆŽa-zđšžćč]{2,21}$/;
    let emailProvera = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let passwordProvera = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;
    // ime
    if(!textProvera.test(name)){
        $('#register-name').css({
            'border':'1px solid red'
        })
        $('#register-namelab').html('Min 2 char, max 21, no digits allowed');
        return false;

    }
    else{
        $('#register-name').css({
            'border':'0'
        })
        $('#register-namelab').html('Name :');
    }

    // prezime
    if(!textProvera.test(surname)){
        $('#register-surname').css({
            'border':'1px solid red'
        })
        $('#register-snamelab').html('Min 2 char, max 21, no digits allowed');
        return false;
    }
    else{
        $('#register-surname').css({
            'border':'0'
        })
        $('#register-snamelab').html('Surname :');
    }

    // email

    if(!emailProvera.test(email)){
        $('#register-email').css({
            'border':'1px solid red'
        })
        $('#register-emlab').html('Enter valid email address');
        return false;
    }
    else{
        $('#register-email').css({
            'border':'0'
        })
        $('#register-emlab').html('Email :');
    }

    //sifra

    if(!passwordProvera.test(password)){
        $('#register-passwd').css({
            'border':'1px solid red'
        })
        $('#register-passlab').html('At least 8 characters with one letter and one number');
        return false;
    }
    else{
        $('#register-passwd').css({
            'border':'0'
        })
        $('#register-passlab').html('Password :');
    }

    // poklapanje sifara

    if(password1 !== password){
        $('#register-passwd1').css({
            'border':'1px solid red'
        })
        $('#register-passlab1').html('Passwords are not matching');
        return false;
    }
    else{
        $('#register-passwd1').css({
            'border':'0'
        })
        $('#register-passlab1').html('Repeat Password :');
    }
    return true;
}
function proveraSubMail(){
    let email = $('#sub-mail').val();
    let emailProvera = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!emailProvera.test(email)){
        $('#sub-mail').css({
            'background':'#e4645b'
        })
    }
    else{
        $('#sub-mail').css({
            'background':'#fff'
        })
    }

}
