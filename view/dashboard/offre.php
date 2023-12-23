<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">
                    <a href="dashboard" class="nav-link text-white-50">Dashboard</a>
                    <img class="close align-self-start" src="assets/img/close.svg" alt="icon">
                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item " style="width: 100%;">
                        <a href="dashboard" class="sidebar_link">
                            <img src="assets/img/1. overview.svg" alt="icon">Overview
                        </a>
                    </li>
                    <li class="sidebar_item">
                        <a href="candidat" class="sidebar_link">
                            <img src="assets/img/agents.svg" alt="icon">Candidat
                        </a>
                    </li>
                    <li class="sidebar_item active">
                        <a href="offre" class="sidebar_link">
                            <img src="assets/img/task.svg" alt="icon">Offre
                        </a>
                    </li>
                    <li class="sidebar_item">
                        <a href="contact" class="sidebar_link">
                            <img src="assets/img/agent.svg" alt="icon">Contact
                        </a>
                    </li>
                    <li class="sidebar_item">
                        <a href="Jobs" class="sidebar_link">
                            <img src="assets/img/articles.svg" alt="icon">Jobs
                        </a>
                    </li>
                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link">
                    <img src="assets/img/settings.svg" alt="icon">Settings
                </a>
            </div>
        </aside>

        <div class="main">
            <?php 
            require __DIR__ . "/nav.php";

            ?>
            <section class="Agents px-4">
                <table class="agent table align-middle bg-white" style="min-width: 700px;">
                    <thead class="bg-light">
                        <tr>
                            <th>Name Candidat</th>
                            <th>email Candidat</th>
                            <th>title_job</th>
                            <th>description</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    foreach($display_offer as $rows){
                    ?>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name"><?= $rows["username"] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name"><?= $rows["email"] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?= $rows["title"] ?>.</p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?= $rows["description"] ?>.</p>
                            </td>
                            <td class="f_position">
                                <p class="fw-normal mb-1 f_title"><?= $rows["status"] ?>. </p>
                            </td>
                            <td class="d-flex">
                                <a href="apply_accepted?id_offre=<?= $rows["id"]?>&id_job=<?= $rows["job_id"]?>&user_email=<?= $rows["email"]?>&user_name=<?= $rows["username"] ?>&job=<?= $rows["title"]?>"
                                    class="w-50"><img class="accept_task" style="width: 85%;"
                                        src="assets/img/journal-check.svg" alt="icon"></a>
                                <a href="apply_rejected?id_offre=<?= $rows["id"]?>&id_job=<?= $rows["job_id"]?>"
                                    class="w-50">
                                    <img class="delet_user" style="width: 85%;" src="assets/img/journal-x.svg"
                                        alt="icon">
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>