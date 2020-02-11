                <div class="sidebar">
                    <ul>
                       <li><a><i class="fas fa-stream"></i> Site Option</a>
                            <ul>
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                            </ul>
                        </li>
                         <li><a><i class="fas fa-stream"></i> Pages</a>
                            <ul>
                                <li><a href="addpage.php">Add Page</a></li>
                                <?php
                                $query = "SELECT * FROM page";
                                $pages = $database->select($query);
                                if($pages) {
                                    while($result = $pages->fetch_assoc()) { ?>
                                      <li><a href='../page.php?pageid=<?php echo $result['id']; ?>'><?php echo $result['page_title']; ?></a></li>
                                <?php
                                    }
                                  }
                                ?>
                                <li><a href="../contact.php">Contact Us</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fas fa-stream"></i> Category</a>
                            <ul>
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a><i class="fas fa-stream"></i> Post</a>
                            <ul>
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
