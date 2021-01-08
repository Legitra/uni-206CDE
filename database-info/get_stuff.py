'''
Python 3.6
-> should work in any 3.x version

Script gets info from php script and formats some of the data returned
'''
import requests

# ------------------------------------------------------------- # column orders (global var)
info        = ['model','name','race','class']
stats       = ['str','dex','con','int','wis','cha','current_hp',\
               'max_hp','armor','speed']
conditions  = ['charm','deafen','fatigue','fright','grappled',\
               'incapacitated','invisible','paralyzed','petrified',\
               'poison','prone','restrained','stun','unconious','exhaustion']

# ------------------------------------------------------------- # functions
def get_stuff(id):
    '''
        takes a string, id, makes a post request and returns the
        string response.
    '''
    get_stuff_url = 'http://[IPHERE]/php/get_all_data.php'   #url of php script
    data_id = {'id':id}                                         #info for post request
    return_data = requests.post(get_stuff_url, data = data_id)  #do the post request
    return return_data.text                                     #return text response

def get_conditions(char):
    '''
        takes array representing a character's condtions table, and
        returns the active conditons in a more readable way.
    '''
    true_conditions = []                                        #temp array
    for c in char:                                              #for every column in the table
        if c != '':                                             #if entry isnt null
            true_conditions.append([conditions[char.index(c)],int(c)])    #append to temp array
    return true_conditions                                      #return temp array

# ------------------------------------------------------------- # 'main' program
# this stuff could quite easily be saved as an object
# but i dont really know how to do objects
# and this needs to be in c# anyway

char_all   = get_stuff('7777777').split('--- ')                 #split response by tables
char_info  = char_all[0].split('<br \>')[:-1]                   #split by html breaks to create columns
char_stats = char_all[1].split('<br \>')[1:-1]                  #split by html breaks to create columns
char_conditions = char_all[2].split('<br \>')[1:-1]             #split by html breaks to create columns

print(char_info)
print('\n')
print(char_stats)
print('\n')
print(char_conditions)
print('\n')
print(get_conditions(char_conditions))
