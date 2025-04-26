import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../../backend/providers/auth_provider.dart';
import '../screens/home.dart';
import '../screens/login.dart';

/// For automatic logging in to app, if we already have the token saved.
class AuthWrapper extends StatelessWidget {
  const AuthWrapper({super.key});

  @override
  Widget build(BuildContext context) {
    final authProvider = Provider.of<AuthProvider>(context);

    return FutureBuilder(
      future: authProvider.tryAutoLogin(),
      builder: (ctx, snapshot) {
        if (snapshot.connectionState == ConnectionState.waiting) {
          return const Scaffold(
            body: Center(child: CircularProgressIndicator()),
          );
        }

        return authProvider.isAuthenticated
            ? const HomeScreen()
            : const LoginScreen();
      },
    );
  }
}
