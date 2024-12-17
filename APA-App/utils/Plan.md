Pages:
Regular user ---------
Dashboard - Welcome, match challenges(place challenges), total matches played, win rate
Profile - picture, bio(pool history, awards), clubs affiliations, password, email, username
Events - display events, signup, view details(venue, availability), 
Leaderboards - player rankings, top 5 or so, best ranked player at the moment

Admin ----- (Regular users pages plus)::
Dashboard - addition of total users registered, total events held and upcoming, (charts on user signing up records)
Profile - just the same
Events - just the same, addition of adding an event, (editing an event, deleting an event maybe)
Leaderboards - just the same
Management 
- managerial page for users (adding and deleting users, changing user roles)
- managerial page for events (adding, editing, and deleting events, viewing attendance)


Database schema:
Roles:
role_id(PK), role
Users:
user_id(PK), username(unique), email(unique), password(hashed), role_id(FK),created_at
Profiles:
profile_id(PK), user_id(FK), bio, picture, club, matches_played, won, lost, win_rate (awards are not gonna be in the profiles table for normalization purposes. however awards will be retrieved from the user_awards table upon opening a user's profile)
Awards:
award_id(PK), award_name, event(FK), prize
User_Awards:
user_id(FK), award_id(FK), COMPOSITE KEY(user_id and award_id)
Events:
event_id(PK), name, venue, date, description, capacity, created_at, prize
Event_Registrations:
reg_id(PK), event_id(FK), user_id(FK), registered_at
Matches:
match_id(PK), challenger_id(FK_user), challenged_id(FK_user), status(ENUM), winner(FK_user), schedule_date
Leaderboards:
leaderboard_id(PK), user_id(PK), won(FK_profiles), lost(FK_profiles)
Ranks:
rank_id(PK), rank(intenger, based on win-rate), user_id(FK)


check for session user_ids in each page and redirect to login if user_ids are not defined