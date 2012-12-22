<ul>
    {foreach from=$aFriends item=friend}
        <li>
            {$friend.full_name} - {$friend.gender}
            {img user=$friend suffix='_50_square' max_width=50 max_height=50}
            <br />
            <a href="#" onclick="return $Core.searchFriendsInput.processClick(this, '2');" >click me</a>
        </li>
    {/foreach}
</ul>