<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    @php
        $page_title = 'Blog - '. $blog->title;
    @endphp
    @include('components.user.css')
</head>

<body>
    @include('components.user.nav')

    <div id="page-header" class="page-header justify-content-center text-center">
        <div class="top-div mb-5"><span class="subheader">Read BLog</span>
            <h1 class="heading"><span class="me-3">Read Our</span><span class="underlined">Blog</span></h1>
        </div>
    </div>

    <div class="section">
        <div class="d-block d-md-flex">
            <div id="blog-details" class="col-md-9 px-4">
                <div class="py-4"><a class="fs-6 text-uppercase fw-bold" href="#">anxiety</a>
                    <h1 class="my-4">Building Your Self Confidence</h1>
                    <p class="fs-5"><span class="me-2">30 March 2024</span><span class="me-2">/</span><a class="fw-bold me-2" href="#">Leroy</a><span class="me-2">/</span><i class="far fa-comment-dots me-2"></i><span class="me-2 color-second">3</span></p>
                </div>
                <div class="mb-5"><img class="rounded-4" src="assets/img/featured_image_blog.jpg"></div>
                <div>
                    <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line. Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.<br><br>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.<br><br><span style="color: rgb(43, 44, 46);">Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.&nbsp;Objectively innovate empowered manufactured products whereas parallel platforms. Holisticly predominate extensible testing procedures for reliable supply chains. Dramatically engage top-line web services vis-a-vis cutting-edge deliverables.&nbsp;Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing. Holistically pontificate installed base portals after maintainable products.Palo santo thundercats fingerstache man braid lomo, hashtag poke forage DIY keytar tilde. Letterpress poke kogi skateboard. Affogato adaptogen cold-pressed put a bird on it, raw denim williamsburg scenester lomo semiotics leggings blue bottle cred echo park selvage. Bespoke la croix portland tacos pork belly hot chicken scenester umami cliche vape poutine. PBR&amp;B pickled wayfarers tilde. Wayfarers biodiesel helvetica yr meh. Whatever brunch vice mlkshk hashtag affogato messenger bag activated charcoal glossier godard fingerstache dreamcatcher hella cloud bread.</span><br><br></p>
                </div>
                <div>
                    <h1 class="mb-4">2 comments</h1>
                    <div id="comment-list">
                        <div id="comment-1" class="comment row mb-4">
                            <div class="col-1 text-center"><i class="fas fa-user-circle fs-1 color-main"></i></div>
                            <div class="col-11">
                                <div class="d-flex justify-content-between"><a href="#">
                                        <h4>Leroy</h4>
                                    </a><span class="fw-bold">January 25, 2024 at 9:35 am</span></div>
                                <p>Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                                <div class=".reply-div"><button class="btn show-replies-btn color-second fw-bold" type="button"><i class="fas fa-share me-2"></i><span>Show Replies</span></button><button class="btn hide-replies-btn d-none color-second fw-bold" type="button"><span>Hide Replies</span></button>
                                    <div class="replies d-none">
                                        <div class="reply-list py-2">
                                            <div class="reply row mb-2">
                                                <div class="col-1 text-center"><i class="fas fa-user-circle fs-1"></i></div>
                                                <div class="col-11"><a href="#"></a>
                                                    <div class="d-flex justify-content-between"><a href="#">
                                                            <h4>Leroy</h4>
                                                        </a><span class="fw-bold">January 25, 2018 at 9:35 am</span></div>
                                                    <p>Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <form method="post" action="post_reply">
                                                <div class="row">
                                                    <div class="col-10"><textarea class="form-control" name="reply" placeholder="Write your reply" required=""></textarea></div>
                                                    <div class="col-2"><button class="btn btn-bg-main" type="submit">Reply</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="comment-2" class="comment row mb-4">
                            <div class="col-1 text-center"><i class="fas fa-user-circle fs-1 color-main"></i></div>
                            <div class="col-11">
                                <div class="d-flex justify-content-between"><a href="#">
                                        <h4>Leroy</h4>
                                    </a><span class="fw-bold">January 25, 2024 at 9:35 am</span></div>
                                <p>Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                                <div class=".reply-div"><button class="btn show-replies-btn color-second fw-bold" type="button"><i class="fas fa-share me-2"></i><span>Show Replies</span></button><button class="btn hide-replies-btn d-none color-second fw-bold" type="button"><span>Hide Replies</span></button>
                                    <div class="replies d-none">
                                        <div class="reply-list py-2">
                                            <div class="reply row mb-2">
                                                <div class="col-1 text-center"><i class="fas fa-user-circle fs-1"></i></div>
                                                <div class="col-11"><a href="#"></a>
                                                    <div class="d-flex justify-content-between"><a href="#">
                                                            <h4>Leroy</h4>
                                                        </a><span class="fw-bold">January 25, 2018 at 9:35 am</span></div>
                                                    <p>Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <form method="post" action="post_reply">
                                                <div class="row">
                                                    <div class="col-10"><textarea class="form-control" name="reply" placeholder="Write your reply" required=""></textarea></div>
                                                    <div class="col-2"><button class="btn btn-bg-main" type="submit">Reply</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form method="post" action="post_comment">
                            <div class="row">
                                <div class="col-10"><textarea class="form-control" name="comment" placeholder="Write your comment" required=""></textarea></div>
                                <div class="col-2"><button class="btn btn-bg-main" type="submit">Comment</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="blog-menu" class="col-md-3 px-2">
                <div class="mb-2 mb-md-5">
                    <form method="get" action="search-blogs">
                        <div class="d-flex"><input class="form-control rounded-pill me-3" type="search" name="search" placeholder="Looking for" required=""><button class="btn btn-link rounded-circle bg-second p-2" type="submit"><i class="fas fa-search text-white"></i></button></div>
                    </form>
                </div>
                <div id="category-sm-list" class="d-block d-md-none py-2"><select class="w-100">
                        <option value="12" selected="">Select Category</option>
                        <option value="13">Anxiety</option>
                        <option value="13">Anxiety</option>
                        <option value="13">Anxiety</option>
                    </select></div>
                <div id="recent-blogs-div" class="mb-5 d-none d-md-block">
                    <h3 class="mb-4">Recent Posts</h3>
                    <div id="recent-blog-list">
                        <div id="recent-blog-1" class="recent-blog row align-items-center mb-2 pb-2 border-bottom">
                            <div class="col-4 h-100 p-0"><a href="#"><img class="rounded" src="assets/img/featured_image_blog.jpg"></a></div>
                            <div class="col-8 p-0 ps-2"><span class="date fw-bold">JANUARY 10, 2018</span><a class="mb-4" href="#">
                                    <h5>Building Your Self Confidence</h5>
                                </a></div>
                        </div>
                        <div id="recent-blog-2" class="recent-blog row align-items-center mb-2 pb-2 border-bottom">
                            <div class="col-4 h-100 p-0"><a href="#"><img class="rounded" src="assets/img/featured_image_blog.jpg"></a></div>
                            <div class="col-8 p-0 ps-2"><span class="date fw-bold">JANUARY 10, 2018</span><a class="mb-4" href="#">
                                    <h5>Building Your Self Confidence</h5>
                                </a></div>
                        </div>
                        <div id="recent-blog-3" class="recent-blog row align-items-center mb-2 pb-2 border-bottom">
                            <div class="col-4 h-100 p-0"><a href="#"><img class="rounded" src="assets/img/featured_image_blog.jpg"></a></div>
                            <div class="col-8 p-0 ps-2"><span class="date fw-bold">JANUARY 10, 2018</span><a class="mb-4" href="#">
                                    <h5>Building Your Self Confidence</h5>
                                </a></div>
                        </div>
                        <div id="recent-blog-4" class="recent-blog row align-items-center mb-2 pb-2 border-bottom">
                            <div class="col-4 h-100 p-0"><a href="#"><img class="rounded" src="assets/img/featured_image_blog.jpg"></a></div>
                            <div class="col-8 p-0 ps-2"><span class="date fw-bold">JANUARY 10, 2018</span><a class="mb-4" href="#">
                                    <h5>Building Your Self Confidence</h5>
                                </a></div>
                        </div>
                        <div id="recent-blog-5" class="recent-blog row align-items-center mb-2 pb-2 border-bottom">
                            <div class="col-4 h-100 p-0"><a href="#"><img class="rounded" src="assets/img/featured_image_blog.jpg"></a></div>
                            <div class="col-8 p-0 ps-2"><span class="date fw-bold">JANUARY 10, 2018</span><a class="mb-4" href="#">
                                    <h5>Building Your Self Confidence</h5>
                                </a></div>
                        </div>
                        <div id="recent-blog-6" class="recent-blog row align-items-center mb-2 pb-2 border-bottom">
                            <div class="col-4 h-100 p-0"><a href="#"><img class="rounded" src="assets/img/featured_image_blog.jpg"></a></div>
                            <div class="col-8 p-0 ps-2"><span class="date fw-bold">JANUARY 10, 2018</span><a class="mb-4" href="#">
                                    <h5>Building Your Self Confidence</h5>
                                </a></div>
                        </div>
                    </div>
                </div>
                <div id="category-list" class="d-none d-md-block">
                    <h3 class="mb-4">Categories</h3>
                    <ul class="list-unstyled">
                        <li class="pb-2 mb-2 border-bottom"><a href="#">Anxiety</a></li>
                        <li class="pb-2 mb-2 border-bottom"><a href="#">Anxiety</a></li>
                        <li class="pb-2 mb-2 border-bottom"><a href="#">Anxiety</a></li>
                        <li class="pb-2 mb-2 border-bottom"><a href="#">Anxiety</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('components.user.footer')
    <script src="{{asset('assets/js/blog_details.js')}}"></script>
</body>

</html>
