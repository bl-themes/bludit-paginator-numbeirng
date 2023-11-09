<?php
if (Paginator::numberOfPages() > 1) {
    $currentPage = Paginator::currentPage(); // Get current page
    $totalPages = Paginator::numberOfPages(); // Get page totals

    // Specify how many pages around the current page you want to display
    $pagesToShow = 5;

    // Calculate the start and end borders for the page to be displayed
    $startPage = max($currentPage - $pagesToShow, 1);
    $endPage = min($currentPage + $pagesToShow, $totalPages);

    // Show button for first page
    if ($startPage > 1) {
        echo "<a class='btn btn-secondary text-light m-1' href='?page=1'>1</a>";
        if ($startPage > 2) {
            echo '...';
        }
    }

    // Show buttons for pages in between
    //If you want to adjust the button spacing you can change the m-3 class according to your design needs
    for ($i = $startPage; $i <= $endPage; $i++) {
        $class = ($i == $currentPage) ? 'btn btn-dark m-1' : 'btn btn-light text-dark m-1';
        echo "<a class='$class' href='?page=$i'>$i</a>";
    }

    // Show button for last page
    if ($endPage < $totalPages) {
        if ($endPage < $totalPages - 1) {
            echo '...';
        }
        echo "<a class='btn btn-secondary text-light m-1' href='?page=$totalPages'>$totalPages</a>";
    }
}
?>
