from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time

driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))
wait = WebDriverWait(driver, 15) # wait 15 second

try:
    # ১. site open
    driver.get("http://127.0.0.1:8000")
    driver.maximize_window()
    time.sleep(2)

    # ২. registration
    driver.find_element(By.LINK_TEXT, "Login / Sign Up").click()
    wait.until(EC.element_to_be_clickable((By.LINK_TEXT, "Register Now"))).click()
    
    driver.find_element(By.NAME, "name").send_keys("TestUserAuto")
    driver.find_element(By.NAME, "email").send_keys("auto_test@gmail.com")
    driver.find_element(By.NAME, "password").send_keys("12345678")
    driver.find_element(By.NAME, "password_confirmation").send_keys("12345678")
    print("Waiting for registration...")
    time.sleep(3)
    driver.find_element(By.CLASS_NAME, "btn-register-purple").click()

    
    time.sleep(3)
    # ৩. login
    driver.find_element(By.NAME, "email").send_keys("auto_test@gmail.com")
    driver.find_element(By.NAME, "password").send_keys("12345678")
    print("Waiting for login...")
    time.sleep(3)
    driver.find_element(By.CLASS_NAME, "btn-login").click()
    time.sleep(5) 

    print("Waiting for Survey Modal...")
    wait.until(EC.presence_of_element_located((By.CLASS_NAME, "survey-modal")))
    
    items = driver.find_elements(By.CLASS_NAME, "survey-item")
    for i in range(3): # first 3 category select
        items[i].click()
        time.sleep(0.5)
    
    time.sleep(3)
    driver.find_element(By.CLASS_NAME, "btn-indigo").click()
    print("Survey completed!")
    time.sleep(3)

    print("Waiting for survey modal to close...")
    time.sleep(10)

    # Searching
    search_box = wait.until(EC.element_to_be_clickable((By.CSS_SELECTOR, ".search_keyword")))
    
    print("Search box found, typing...")
    search_box.click() # search box click
    search_box.send_keys("Find me a bag")
    time.sleep(1)
    search_box.send_keys(Keys.RETURN)
    
    time.sleep(5)
    driver.save_screenshot("full_system_flow_with_survey.png")
    print("Flow completed the test! Screenshot saved.")

    time.sleep(5)

finally:
    driver.quit()