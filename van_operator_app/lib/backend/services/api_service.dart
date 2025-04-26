import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

/// Service to handle all authenticated requests from the user to the api.
class ApiService {
  static const String _baseUrl = 'https://127.0.0.1:8000/api';
  static String? _token;

  static Future<http.Response> get(String endpoint) async {
    final token = await _getToken();
    return await http.get(
      Uri.parse('$_baseUrl/$endpoint'),
      headers: _buildHeaders(token),
    );
  }

  static Future<http.Response> post(String endpoint, dynamic body) async {
    final token = await _getToken();
    return await http.post(
      Uri.parse('$_baseUrl/$endpoint'),
      headers: _buildHeaders(token),
      body: body,
    );
  }

  static Map<String, String> _buildHeaders(String? token) {
    final headers = {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
    };

    if (token != null) {
      headers['Authorization'] = 'Bearer $token';
    }

    return headers;
  }

  static Future<String?> _getToken() async {
    if (_token != null) return _token;
    final prefs = await SharedPreferences.getInstance();
    _token = prefs.getString('auth_token');
    return _token;
  }
}
