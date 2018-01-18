@extends('layouts.app')

@section('content')

    <!-- main -->
    <section class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="forums.html">Videos</a></li>
                <li class="active">Star Wars Battlefront II: Full Length Reveal Trailer</li>
            </ol>
        </div>
    </section>

    <section class="bg-image" style="background-image: url('https://img.youtube.com/vi/zSd9McRXHZ8/maxresdefault.jpg');">
        <div class="overlay-light"></div>
        <div class="container">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ 'https://www.youtube.com/embed/' . $tutorial->link . '?rel=0&amp;amp;autoplay=1&amp;amp;showinfo=0' }}" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="post post-single">
                        <div class="post-header">
                            <div>
                                <a href="profile.html"><img src="img/user/user-3.jpg" alt=""></a>
                            </div>
                            <div>
                                <h2 class="post-title">Star Wars Battlefront II: Full Length Reveal Trailer</h2>
                                <div class="post-meta">
                                    <span><i class="fa fa-clock-o"></i> August 22, 2017 by <a href="profile.html">Clark</a></span>
                                    <span><a href="#comments"><i class="fa fa-comment-o"></i> 33 comments</a></span>
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit ante, congue sodales orci ac, ultrices pretium lectus. Maecenas lorem enim, dignissim sed lacus non, feugiat iaculis lorem. Integer eu aliquet diam. Suspendisse fringilla
                            porta justo, vel tempus risus. Ut et enim sit amet libero fermentum aliquam et ut sem.</p>
                        <p>Maecenas viverra, mi non consectetur scelerisque, erat enim interdum erat, imperdiet elementum sapien metus a odio. Sed sapien sapien, tincidunt quis fringilla vel, eleifend tincidunt nunc. Fusce dapibus leo vestibulum, scelerisque metusnec,
                            imperdiet tortor.usce et urna vel neque fermentum consectetur. Donec vel convallis elit. Nulla et odio a magna aliquam varius a vel ex. Cras sed dolor sapien. Sed sit amet interdum sapien, ut laoreet dui. Fusce vulputate consequat mi et
                            rutrum.</p>
                    </div>
                    <div class="post-actions">
                        <div class="post-tags">
                            <a href="#">#star wars</a>
                            <a href="#">#battlefront 2</a>
                            <a href="#">#gameplay</a>
                            <a href="#">#trailer</a>
                            <a href="#">#galaxy</a>
                        </div>
                        <div class="social-share">
                            <a class="btn btn-social btn-facebook btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on facebook"><i class="fa fa-facebook"></i></a>
                            <span>5.345k</span>
                            <a class="btn btn-social btn-twitter btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on twitter"><i class="fa fa-twitter"></i></a>
                            <a class="btn btn-social btn-google-plus btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on google-plus"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    <div id="comments" class="comments anchor">
                        <div class="comments-header">
                            <h5><i class="fa fa-comment-o"></i> Comments (5)</h5>
                            <div class="dropdown float-right">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Sorted by best <span class="caret"></span></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item active" href="#">Best</a>
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Oldest</a>
                                    <a class="dropdown-item" href="#">Random</a>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary text-left m-t-15 btn-block" href="#comments" role="button"><i class="fa fa-spinner fa-pulse m-r-5"></i> Load more 4 comments</a>
                        <ul>
                            <li>
                                <div class="comment">
                                    <div class="comment-avatar">
                                        <a href="profile.html"><img src="img/user/user-1.jpg" alt=""></a>
                                        <a class="badge badge-primary" href="profile.html" data-toggle="tooltip" data-placement="bottom" title="Add as friend"><i class="fa fa-user-plus"></i></a>
                                    </div>
                                    <div class="comment-post">
                                        <div class="comment-header">
                                            <div class="comment-author">
                                                <h5><a href="profile.html">Venom</a></h5>
                                                <span>Member</span>
                                            </div>
                                            <div class="comment-action">
                                                <div class="dropdown float-right">
                                                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-chevron-down"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Moderate</a>
                                                        <a class="dropdown-item" href="#">Embed</a>
                                                        <a class="dropdown-item" href="#">Report</a>
                                                        <a class="dropdown-item" href="#">Mark as spam</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>Awesome these are news we were looking for, thanks DICE best thing i've heard today, but more game modes are welcome.</p>
                                        <div class="comment-footer">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-heart-o"></i> Like</a></li>
                                                <li><a href="#"><i class="icon-reply"></i> Reply</a></li>
                                                <li><a href="#"><i class="fa fa-clock-o"></i> 3 hours ago</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-avatar"><img src="img/user/user-2.jpg" alt=""></div>
                                            <div class="comment-post">
                                                <div class="comment-header">
                                                    <div class="comment-author">
                                                        <h5><a href="profile.html">Elizabeth</a></h5>
                                                        <span>Member</span>
                                                    </div>
                                                    <div class="comment-action">
                                                        <div class="dropdown float-right">
                                                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-chevron-down"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#">Moderate</a>
                                                                <a class="dropdown-item" href="#">Embed</a>
                                                                <a class="dropdown-item" href="#">Report</a>
                                                                <a class="dropdown-item" href="#">Mark as spam</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>Please also consider replacing Battles with Blast (in Skirmish): it can use the same AI and would be much more fun (tokens are annoying and maps are limited)!</p>
                                                <div class="comment-footer">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-heart-o"></i> Like</a></li>
                                                        <li><a href="#"><i class="icon-reply"></i> Reply</a></li>
                                                        <li><a href="#"><i class="fa fa-clock-o"></i> 24 minutes ago</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-avatar"><a href="profile.html"><img src="img/user/user-3.jpg" alt=""></a></div>
                                    <div class="comment-post">
                                        <div class="comment-header">
                                            <div class="comment-author">
                                                <h5>
                                                    <a href="profile.html">Clark</a>
                                                    <span class="badge badge-outline-primary">Admin</span>
                                                </h5>
                                            </div>
                                            <div class="comment-action">
                                                <div class="comment-action">
                                                    <div class="dropdown float-right">
                                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-chevron-down"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Moderate</a>
                                                            <a class="dropdown-item" href="#">Embed</a>
                                                            <a class="dropdown-item" href="#">Report</a>
                                                            <a class="dropdown-item" href="#">Mark as spam</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>Thank you this news and I can't wait for offline content to drop next week.</p>
                                        <div class="comment-footer">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-heart-o"></i> Like</a></li>
                                                <li><a href="#"><i class="icon-reply"></i> Reply</a></li>
                                                <li><a href="#"><i class="fa fa-clock-o"></i> June 16, 2017 8:13 pm</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-avatar"><a href="profile.html"><img src="img/user/user-4.jpg" alt=""></a></div>
                                    <div class="comment-post">
                                        <div class="comment-header">
                                            <div class="comment-author">
                                                <h5><a href="profile.html">Strange</a></h5>
                                                <span>Member</span>
                                            </div>
                                            <div class="comment-action">
                                                <div class="comment-action">
                                                    <div class="dropdown float-right">
                                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-chevron-down"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Moderate</a>
                                                            <a class="dropdown-item" href="#">Embed</a>
                                                            <a class="dropdown-item" href="#">Report</a>
                                                            <a class="dropdown-item" href="#">Mark as spam</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>To all those reading who have not yet bought this game yet, and are a fan of Star Wars - Don't listen to the nay-sayers on these forums, this game is simply amazing!</p>
                                        <div class="comment-footer">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-heart-o"></i> Like</a></li>
                                                <li><a href="#"><i class="icon-reply"></i> Reply</a></li>
                                                <li><a href="#"><i class="fa fa-clock-o"></i> June 11, 2017 14:26 am</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <form>
                            <h5>Leave a comment</h5>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Your Comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-shadow">Submit Comment</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <!-- widget post  -->
                        <div class="widget widget-videos">
                            <h5 class="widget-title">Recommends</h5>
                            <ul class="widget-list">
                                <li>
                                    <div class="widget-img">
                                        <a href="blog-post.html"><img src="https://i1.ytimg.com/vi/4BLkEJu9szM/mqdefault.jpg" alt=""></a>
                                        <span>2:13</span>
                                    </div>
                                    <h4><a href="blog-post.html">Titanfall 2's Trophies Only Have 3 Earned Through Multiplayer</a></h4>
                                    <span><i class="fa fa-clock-o"></i> July 30, 2017</span>
                                    <span><i class="fa fa-eye"></i> 345x</span>
                                </li>
                                <li>
                                    <div class="widget-img">
                                        <a href="blog-post.html"><img src="https://i1.ytimg.com/vi/Kae-JjbLsgA/mqdefault.jpg" alt=""></a>
                                        <span>13:07</span>
                                    </div>
                                    <h4><a href="blog-post.html">Star Wars Battlefront II -- The Story of an Imperial Soldier</a></h4>
                                    <span><i class="fa fa-clock-o"></i> July 29, 2017</span>
                                    <span><i class="fa fa-eye"></i> 1269x</span>
                                </li>
                                <li>
                                    <div class="widget-img">
                                        <a href="blog-post.html"><img src="https://i.ytimg.com/vi/kUKrStkG-hE/mqdefault.jpg" alt=""></a>
                                        <span>5:17</span>
                                    </div>
                                    <h4><a href="blog-post.html">Far Cry 5: Full Length Reveal Trailer</a></h4>
                                    <span><i class="fa fa-clock-o"></i> July 20, 2017</span>
                                    <span><i class="fa fa-eye"></i> 692x</span>
                                </li>
                                <li>
                                    <div class="widget-img">
                                        <a href="blog-post.html"><img src="https://i1.ytimg.com/vi/B6qY-P4eo1Q/mqdefault.jpg" alt=""></a>
                                        <span>2:30</span>
                                    </div>
                                    <h4><a href="blog-post.html">Mafia 3: The Movie (All Cutscenes HD)</a></h4>
                                    <span><i class="fa fa-clock-o"></i> June 13, 2017</span>
                                    <span><i class="fa fa-eye"></i> 1136x</span>
                                </li>
                                <li>
                                    <div class="widget-img">
                                        <a href="blog-post.html"><img src="https://i1.ytimg.com/vi/1Y_DVbmRNhc/mqdefault.jpg" alt=""></a>
                                        <span>2:12</span>
                                    </div>
                                    <h4><a href="blog-post.html">Ghost in the Shell (2017) - Official Trailer</a></h4>
                                    <span><i class="fa fa-clock-o"></i> May 14, 2017</span>
                                    <span><i class="fa fa-eye"></i> 7879x</span>
                                </li>
                                <li>
                                    <div class="widget-img">
                                        <a href="blog-post.html"><img src="https://i1.ytimg.com/vi/PmaZw1xMxBQ/mqdefault.jpg" alt=""></a>
                                        <span>15:38</span>
                                    </div>
                                    <h4><a href="blog-post.html">Call of Duty: Infinite Warfare Gameplay</a></h4>
                                    <span><i class="fa fa-clock-o"></i> March 1, 2017</span>
                                    <span><i class="fa fa-eye"></i> 723x</span>
                                </li>
                            </ul>
                        </div>
                        <!-- /widget post -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /main -->


@endsection