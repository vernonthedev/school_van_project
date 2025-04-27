import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'backend/providers/auth_provider.dart';
import 'frontend/screens/home.dart';
import 'frontend/widgets/auth_wrapper.dart';
import 'package:firebase_core/firebase_core.dart';
import 'firebase_options.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  // initializing firebase and firestore
  await Firebase.initializeApp(options: DefaultFirebaseOptions.currentPlatform);
  // initializing shared preferences storage
  final prefs = await SharedPreferences.getInstance();
  runApp(MyApp(prefs: prefs));
}

class MyApp extends StatelessWidget {
  final SharedPreferences prefs;

  const MyApp({super.key, required this.prefs});

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (ctx) => AuthProvider(),
      child: MaterialApp(
        title: 'School Van Operator',
        debugShowCheckedModeBanner: false,
        theme: ThemeData(
          primarySwatch: Colors.purple,
          visualDensity: VisualDensity.adaptivePlatformDensity,
        ),
        home: const AuthWrapper(),
        routes: {'/home': (ctx) => const HomeScreen()},
      ),
    );
  }
}
