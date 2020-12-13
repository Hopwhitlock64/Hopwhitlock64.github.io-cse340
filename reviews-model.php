<?php
// Insert a review 
function insertReview($reviewText, $invId, $clientId){
    $db = phpmotorsConnect(); 
    $sql = 'INSERT INTO reviews (reviewText, invId, clientId) VALUES (:reviewText, :invId, :clientId)';     
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
// Get reviews for a specific inventory item 
 function getReviewsByInventory($invId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews JOIN clients ON clients.clientId = reviews.clientId WHERE invId = :invId ORDER BY reviewDate desc';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
 }
// Get reviews written by a specific client Id
function getReviewsByClient($clientId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews JOIN clients ON clients.clientId = reviews.clientId WHERE reviews.clientId = :clientId ORDER BY reviewDate desc';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}
// Get a specific review by reviewId
function getReviewsById($reviewId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews JOIN inventory ON inventory.reviewId = reviews.invId WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}
// Update a specific review 
function updateReview($reviewId, $reviewText){
    $db = phpmotorsConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
     $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
// Delete a specific review by reviewId
function deleteReview($reviewId){
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
?>
