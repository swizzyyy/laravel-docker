<h2>Documentation<h2></h2>
<h3>Usage</h3>
<h5>git clone https://github.com/swizzyyy/laravel-docker</h5>
<h5>docker compose up -d --build</h5>

<h3>We have 2 authentications one for admin and other one for player.</h3>
<h3>If you try to authenticate as a player with admin token is not gonna work as well as player cant reach endpoints created for admin</h3>


<h3>Admin Auth Endpoint:</h3>
<h4>/api/auth/token/admin ("Post Method") email:admin@example.com pass:qwer1234</h4>
<h3>Player Auth Endpoint:</h3>
<h4>/api/auth/token/player P.s password is "password" and an email you can take from /api/players but You must be authorized as an administrator</h4>

<h3>Endpoints for admin</h3>

<h4>Headers: Accept: application/json; Content-Type: application/json; Authentication Bearer</h4>

<h4>Prizes</h4>
    <ul>
<li>/api/prize - GET Method returns all Prizes (Cached in Redis)</li>
<li>/api/prize - POST Method Create Prize {"name": "Test prize", "type": custom_prize|lottery_ticket} - Returns Created Records</li>
<li>/api/prize/{prizeID} - PUT Method Update The Prize</li>
  </ul>
<h4>Ranks</h4>
    <ul>
<li>/api/rank - GET Method returns all ranks (Cached in Redis)</li>
<li>/api/rank - POST Method Create Rank {"name": "Rank 1", "rank_category_id": 1} - Returns Created Records</li>
<li>/api/rank/{rankID} - PUT Method Update The Rank</li>
    </ul>
<h4>Rank Categories</h4>
<ul>
    <li>/api/rankCategories - GET Method returns all rank Categories (Cached in Redis)</li>
    <li>/api/rankCategories - POST Method Create Rank category {"name": "Test Rank Group 1"} - Returns Created Records</li>
    <li>/api/rankCategories/{rankCategoryID} - PUT Method Update The Rank Category</li>
</ul>
<h4>Assign Prize to Rank Group</h4>
<ul>
    <li>/api/assignPrize - POST Method Creates Or Updates Prize of rank group {"rank_category_id": 3, "amount": 100000} - Returns Created Or Updated Records</li>
</ul>
<h4>Get All Players</h4>
<ul>
    <li>/api/players - GET Method - Returns All players</li>
</ul>

<h3>Endpoints for player</h3>
<h4>Headers: Accept: application/json; Content-Type: application/json; Authentication Bearer</h4>
<h4>Spin the wheel</h4>
<ul>
    <li>/api/spin - GET Method</li>
</ul>
