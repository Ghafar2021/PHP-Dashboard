<?php
$path = $_SERVER['REQUEST_URI'];
?>


<div
                    class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary"
                >
                    <div
                        class="offcanvas-md offcanvas-end bg-body-tertiary"
                        tabindex="-1"
                        id="sidebarMenu"
                    >
                        <div class="offcanvas-header">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="offcanvas"
                                data-bs-target="#sidebarMenu"
                            ></button>
                        </div>

                        <div
                            class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
                        >
                            <ul class="nav flex-column pe-3">
                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 <?= str_contains($path, 'pages') ? '' : 'text-secondary' ?>"
                                        href="/php_sql_proj/admin-panel/index.php">
                                        <i
                                            class="bi bi-house-fill fs-4 text-secondary"
                                        ></i>
                                        <span class="fw-bold">Dashboard</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 <?= str_contains($path, 'posts') ? 'text-secondary' : '' ?>"
                                        href="/php_sql_proj/admin-panel/pages/posts/index.php"
                                    >
                                        <i
                                            class="bi bi-file-earmark-image-fill fs-4 text-secondary"
                                        ></i>
                                        <span class="fw-bold">Articles</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 <?= str_contains($path, 'categories') ? 'text-secondary' : '' ?>"
                                        href="/php_sql_proj/admin-panel/pages/categories/index.php"  
                                    >
                                        <i
                                            class="bi bi-folder-fill fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">Category</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 <?= str_contains($path, 'comments') ? 'text-secondary' : '' ?>"
                                        href="/php_sql_proj/admin-panel/pages/comments/index.php"
                                    >
                                        <i
                                            class="bi bi-chat-left-text-fill fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold"> Comments</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="/php_sql_proj/admin-panel/pages/auth/logout.php"
                                    >
                                        <i
                                            class="bi bi-box-arrow-right fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">Exit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>