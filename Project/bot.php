<?php
    // Function to compare input string to predefined strings and return the most similar
    function find_match($input) {
        // Connect to database
        $conn = mysqli_connect("localhost","root","","chatbot");
        if(!$conn){
            echo "connection Failed " . mysqli_connect_errno();
        }
        $query = "SELECT messages, response FROM chats";
        $runQuery = mysqli_query($conn, $query);
        $highest_score = 0;
        $best_match = "";
        $words = explode(" ", $input);
        // Loop through predefined strings
        if(mysqli_num_rows($runQuery) > 0){
            while($row = mysqli_fetch_assoc($runQuery)) {
                foreach($words as $word){
                    similar_text($word, $row['messages'], $score);
                    if ($score > $highest_score) {
                        $highest_score = $score;
                        $best_match = $row['response'];
                    }
                }
            }
        }

        if(!empty($best_match)){
            return $best_match;
        }else{        return "Sorry, I couldn't understand you!";
    }
}
    // Example usage
    $input = $_POST["messageValue"];
    echo  find_match($input);

?>