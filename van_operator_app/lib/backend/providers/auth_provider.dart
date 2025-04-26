import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import '../functions/login.dart';
import '../models/user.dart';

class AuthProvider with ChangeNotifier {
  User? _user;
  String? _token;

  User? get user => _user;
  String? get token => _token;

  bool get isAuthenticated => _token != null;

  Future<void> login(String email, String password) async {
    try {
      final response = await LoginService.login(email, password);

      final prefs = await SharedPreferences.getInstance();
      await prefs.setString('auth_token', response['token']);

      _token = response['token'];
      _user = User.fromJson(response);

      notifyListeners();
    } catch (e) {
      rethrow;
    }
  }

  Future<void> logout() async {
    try {
      if (_token != null) {
        await LoginService.logout(_token!);
      }

      final prefs = await SharedPreferences.getInstance();
      await prefs.remove('auth_token');

      _token = null;
      _user = null;

      notifyListeners();
    } catch (e) {
      rethrow;
    }
  }

  Future<void> tryAutoLogin() async {
    final prefs = await SharedPreferences.getInstance();
    final token = prefs.getString('auth_token');

    if (token != null) {
      _token = token;
      // todo: fetch user data
      notifyListeners();
    }
  }
}
